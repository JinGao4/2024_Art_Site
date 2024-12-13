<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the reviews (not implemented).
     */
    public function index()
    {
        // Code for displaying a list of reviews (not implemented yet).
    }

    /**
     * Show the form for creating a new review (not implemented).
     */
    public function create()
    {
        // Code for displaying a form to create a review (not implemented yet).
    }

    /**
     * Store a newly created review for a specific art.
     */
    public function store(Request $request, Art $art)
    {
        // Validate the rating and optional comment
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',  // Rating must be an integer between 1 and 5
            'comment' => 'nullable|string|max:1000',     // Comment is optional and limited to 1000 characters
        ]);

        // Create the review for the given art
        $art->reviews()->create([
            'user_id' => auth()->id(),                    // Set the logged-in user as the reviewer
            'rating' => $request->input('rating'),        // Save the rating
            'comment' => $request->input('comment'),      // Save the comment (if provided)
            'art_id' => $art->id,                          // Associate the review with the art
        ]);

        // Redirect back to the art's page with a success message
        return redirect()->route('arts.show', $art)->with('success', 'Review added successfully.');
    }

    /**
     * Display the specified review (not implemented).
     */
    public function show(Review $review)
    {
        // Code for displaying a specific review (not implemented yet).
    }

    /**
     * Show the form for editing the specified review.
     */
    public function edit(Review $review)
    {
        // Check if the logged-in user is the owner of the review or an admin
        if (auth()->user()->id !== $review->user_id && auth()->user()->role !== 'admin') {
            // Deny access if the user is not the review owner or an admin
            return redirect()->route('arts.index')->with('error', 'Access denied.');
        }

        // Return the 'edit' view with the review data to allow editing
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified review.
     */
    public function update(Request $request, Review $review)
    {
        // Update the review's rating and comment based on the validated request
        $review->update($request->only(['rating', 'comment']));

        // Redirect to the art's page with a success message after updating the review
        return redirect()->route('arts.show', $review->art_id)
                        ->with('success', 'Review updated successfully.');
    }

    /**
     * Remove the specified review from storage.
     */
    public function destroy(Review $review)
    {
        // Delete the review from the database
        $review->delete();

        // Redirect back to the arts index with a success message
        return redirect()->route('arts.index')->with('success', 'Review deleted successfully.');
    }
}
