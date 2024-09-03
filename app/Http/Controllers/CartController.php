<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Show the shopping cart
    public function index()
    {
        $cartItems = Session::get('cart', []);
        return view('cart.index', ['cartItems' => $cartItems]);
    }

    // Add an item to the cart
    public function store(Request $request)
    {
        $artworkId = $request->input('artwork_id');
        $artwork = Artwork::find($artworkId);

        if (!$artwork) {
            return redirect()->back()->with('error', 'Artwork not found.');
        }

        $cart = Session::get('cart', []);
        if (isset($cart[$artworkId])) {
            $cart[$artworkId]['quantity'] += 1;
        } else {
            $cart[$artworkId] = [
                'title' => $artwork->title,
                'price' => $artwork->price,
                'quantity' => 1,
                'image' => $artwork->image,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Artwork added to cart.');
    }

    // Remove an item from the cart
    public function destroy($id)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }
}
