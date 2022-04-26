<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller {
    public function index() {
        $data = [
            'reviews' => Review::orderBy('name')->orderByDesc('created_at')->with('brand')->get(),
        ];
        return view('review.index', $data);
    }

    public function create() {
        $data = [
            'manufacturers' => Manufacturer::orderBy('title')->get(),
        ];
        return view('review.create', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'manufacturer' => ['nullable', 'exists:manufacturers,id'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:500'],
        ]);

        $review = Review::create([
            'manufacturer_id' => $request->manufacturer,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($review) {
            return redirect()->route('admin.review.index')->withSuccessMessage('A new review from user <strong>' . $review->name . '</strong> has been created successfully!');
        }
        return redirect()->back(302, [], route('admin.review.create'))->withInput($request->all())->withErrorMessage('The server encountered an error while trying to create an review. Please try again.');
    }
    public function approved($id) {
        $review = Review::where('id', $id)->first();
        $review->status = true;
        $review->update();
        return redirect()->route('admin.review.index')->withSuccessMessage('The review from user <strong>' . $review->name . '</strong> has been approved successfully!');
    }

    public function destroy(Review $review) {
        $deleted = $review->delete();

        if ($deleted) {
            return redirect()->route('admin.review.index')->withSuccessMessage('The review from user <strong>' . $review->name . '</strong> has been deleted successfully!');
        }
        return redirect()->route('admin.review.index')->withErrorMessage('The server encountered an error while trying to delete an review. Please try again.');
    }
}
