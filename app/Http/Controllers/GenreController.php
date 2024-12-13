<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GenreController extends Controller
{
    /**
     * Display a list of all genres along with their associated arts.
     */
    public function index()
    {
        // Retrieve genres with associated arts
        $genres = Genre::with('arts')->get();
        // Return the 'index' view with the genres data
        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form to create a new genre (only accessible to admins).
     */
    public function create()
    {
        // Check if the user is not an admin
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('genre.index')->with('error', 'Access denied');
        }
        // Retrieve all arts
        $arts = Art::all();
        // Return the 'create' view for the genre form
        return view('genres.create');
    }

    /**
     * Store a new genre with its details and associated arts.
     */
    public function store(Request $request)
    {
        // Check if the user is not an admin
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('genres.index')->with('error', 'Access denied');
        }

        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about' => 'nullable|string|max:500',
            'arts' => 'array',
        ]);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/arts'), $imageName);
            $validated['image'] = 'images/arts/' . $imageName;
        }

        // Create the genre
        $genre = Genre::create($validated);

        // Sync selected arts with the genre
        if ($request->has('arts')) {
            $genre->arts()->sync($request->arts);
        }

        // Redirect back to genres list with success message
        return redirect()->route('genres.index')->with('success', 'Genre created successfully.');
    }

    /**
     * Show the details of a single genre.
     */
    public function show(Genre $genre)
    {
        // Load the arts related to this genre
        $genre->load('arts');
        // Return the 'show' view with genre data
        return view('genres.show', compact('genre'));
    }

    /**
     * Show the form to edit an existing genre.
     */
    public function edit(Genre $genre)
    {
        // Retrieve all arts and the selected arts for the genre
        $arts = Art::all();
        $genreArts = $genre->arts->pluck('id')->toArray();
        // Return the 'edit' view with genre data
        return view('genres.edit', compact('genre', 'arts', 'genreArts'));
    }

    /**
     * Update the genre details.
     */
    public function update(Request $request, Genre $genre)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about' => 'nullable|string',
            'arts' => 'array',
        ]);

        // Update the genre with validated data
        $genre->update($validated);

        // Attach the selected arts to the genre
        if ($request->has('arts')) {
            $genre->arts()->attach($request->arts);
        }

        // Redirect to the genres list with success message
        return redirect()->route('genres.index')->with('success', 'Genre updated successfully.');
    }

    /**
     * Remove the genre from storage and detach its related arts.
     */
    public function destroy(Genre $genre)
    {
        // Detach associated arts
        $genre->arts()->detach();
        // Delete the genre
        $genre->delete();
        // Redirect back with success message
        return redirect()->route('genres.index')->with('success', 'Genre deleted successfully.');
    }
}

