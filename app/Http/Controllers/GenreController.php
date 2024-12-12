<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::with('art')->get();
        return view('genres.indes', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth->user()->role !== 'admin'){
            return redirect()->route('arts.index')->with('error','Access denied');
        }

        $arts = Art::all();
        return view('genres.create', compact('arts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth->user()->role !== 'admin'){
            return redirect()->route('arts.index')->with('error','Access denied');
        }

        $validated = $request -> validate([
            'name'=>'required|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about'=>'nullable|string',
            'art'=>'array',
        ]);

        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('image/genres'),$imageName);

            $validated['image']=$imageName;
        }

        $genre = Genre::create($validated);

        if($request->has('arts')){
            $genre->arts()->attach($request->arts);
        }
        return redirect()->route('genres.index')->with('success','genre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        $genre->load('arts');
        return (view('genres.show',compact('genre')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        $arts = Art::all();
        $genreArts = $genre->arts->pluck('id')->toArray();
        return view('genres.edit', compact('genre','arts','genreArt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $validated = $request -> validate([
            'name'=>'required|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about'=>'nullable|string',
            'art'=>'array',
        ]);

        $genre ->update($validated);

        if($request->has('arts')){
            $genre->arts()->attach($request->arts);
        }
        return redirect()->route('genres.index')->with('success','genre created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->arts()->detach();
        $genre->delete();
        return redirect()->route('genres.index')->with('success','genre deleted successfully.');
    }
}
