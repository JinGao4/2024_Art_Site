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
    public function index(Request $request)
    {
        {
            $arts = Art::all();
            //looks for the title, where it search this URL in database
            $title = $request->input('title');
            // started query builder for the 'Art' model, allowing us to filter and retrieve art records.
            $query = Art::query();
            //putting a if statment,if the 'title' variable is not empty, meaning the user has entered a search for the title.
            if (!empty($title)) {
                $query->where('title', 'LIKE', "%{$title}%");
            }
    
            // retrieve the matching 'Art' records from the database
            // The result will be a collection of 'Art' objects or an empty collection if no found
            $arts = $query->get();
    
            return view('arts.index', [
                'arts' => $arts,
                'title' => $title,  
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !=='admin') {
            return redirect()->route('arts.index')->with('error','Access denied.');
        }

        return view('arts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** inputs */
        $request->validate([
            'title'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about'=>'required',
            'artistname'=>'required',
        ]);

        /** check if it uploaded the image and handle it */
        if ($request->hasFile('image')){

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/arts'), $imageName);
        }

        /** create new art record in database */
        Art::create([
            'title'=> $request->title,
            'image'=> $imageName, /** store imge URL in DB */
            'about'=> $request->about,
            'artistname'=> $request->artistname,
        ]);

        /** Redirect to index with a success message */
        return to_route('arts.index')->with('success','art piece have being created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Art $art)
    {
        return view('arts.show')-> with ('art',$art);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Art $art)
    {
        return view('arts.edit', compact('art'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Art $art)
    {
        $validatedData  = $request->validate([
            'title' => 'string',
            'about' => 'string',
            'artistname' => 'string',
            'image' => 'string',
        ]);

        $art->update($validatedData);

        return redirect()->route('arts.index')->with('success', 'art updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Art $art)
    {
        $art->delete();
        return redirect()->route('arts.index')->with('success', 'art delete successfully');
    }
}
