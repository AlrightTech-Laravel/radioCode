<?php

namespace App\Http\Controllers;

use App\Models\Choose;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChooseController extends Controller
{

    public function index()
    {
        $data = [
            'chooses' => Choose::orderBy('title')->get(),
        ];
        return view('Choose.index', $data);
    }
    public function create()
    {
        return view('Choose.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:500'],
        ]);

        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $filename = time()."_.".$extension;
            $request->image->move(public_path('Uploads'), $filename);
        }

        $choose = Choose::create([
            'title' => $request->title,
            'image' => $filename,
            'description' => $request->description,
        ]);

        if($choose){
            return redirect()->route('admin.choose.index')->withSuccessMessage('A new choose with title <strong>'.$choose->title.'</strong> has been created successfully!');
        }
        return redirect()->back(302, [], route('admin.choose.create'))->withInput($request->all())->withErrorMessage('The server encountered an error while trying to create an choose. Please try again.');
    }

    public function destroy(Choose $choose)
    {
        $deleted = $choose->delete();

        if($deleted){
            return redirect()->route('admin.choose.index')->withSuccessMessage('The choose with title <strong>'.$choose->title.'</strong> has been deleted successfully!');
        }
        return redirect()->route('admin.choose.index')->withErrorMessage('The server encountered an error while trying to delete an choose. Please try again.');
    }
}
