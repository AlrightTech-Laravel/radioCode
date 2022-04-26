<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqController extends Controller
{
    public function index()
    {
        $data = [
            'faqs' => Faq::orderBy('title')->orderBy('type')->get(),
        ];
        return view('faq.index', $data);
    }

    public function create()
    {
        return view('faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'type' => ['required', Rule::in(array_keys(Faq::$types))],
            'description' => ['required', 'string', 'min:10', 'max:500'],
        ]);

        $faq = Faq::create([
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
        ]);

        if($faq){
            return redirect()->route('admin.faq.index')->withSuccessMessage('A new faq with title <strong>'.$faq->title.'</strong> has been created successfully!');
        }
        return redirect()->back(302, [], route('admin.faq.create'))->withInput($request->all())->withErrorMessage('The server encountered an error while trying to create an faq. Please try again.');
    }

    public function destroy(Faq $faq)
    {
        $deleted = $faq->delete();

        if($deleted){
            return redirect()->route('admin.faq.index')->withSuccessMessage('The faq with title <strong>'.$faq->title.'</strong> has been deleted successfully!');
        }
        return redirect()->route('admin.faq.index')->withErrorMessage('The server encountered an error while trying to delete an faq. Please try again.');
    }
}
