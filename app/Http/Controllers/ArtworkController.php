<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    public function index()
    {
        $artworks = Artwork::with('artist', 'category')->get();
        return view('artworks.index', compact('artworks'));
    }

    public function getArt(){
         // Fetch featured artworks or any other data needed for the homepage
    $featuredArtworks = Artwork::with('category')->get();

    // dd($featuredArtworks);

    return view('home', compact('featuredArtworks'));
    }

    public function show(Artwork $artwork)
    {
        return view('artworks.show', compact('artwork'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('artworks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $path = $request->file('image')->store('images', 'public');

        Artwork::create([
            'artist_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('artworks.index');
    }
}
