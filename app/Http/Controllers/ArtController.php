<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arts = Art::all();//Fetch all art
        return view('arts.index', compact('arts')); // return the view with arts
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Art $art)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Art $art)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Art $art)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Art $art)
    {
        //
    }
}
