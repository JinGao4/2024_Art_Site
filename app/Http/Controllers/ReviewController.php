<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rating'=>'required|integer|min:1|max:5',
            'comment'=>'nullable|string|max:1000',
        ]);

        $art->reviews()->create([
            'user_id'=>auth()->id(),
            'rating'=>$request->input('rating'),
            'comment'=>$request->input('comment'),
            'art_id'=>$art->id,
        ]);

        return redirect()->route('arts.show',$art)->with('success','Review added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
