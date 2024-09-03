<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage with featured artworks.
     */
    public function index()
    {
        // Fetch featured artworks
        $featuredArtworks = Artwork::where('featured', true)->get();

        // Return the view with featured artworks
        return view('home', compact('featuredArtworks'));
    }
}
