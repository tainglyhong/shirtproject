<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add to cart method
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        // Retrieve the cart from session, or create an empty array if not set
        $cart = session()->get('cart', []);

        // Check if the product is already in the cart, update quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->input('quantity', 1);
        } else {
            // Add product to the cart with default values
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $request->input('quantity', 1),
                "price" => $product->price,
                "image" => $product->image,
                "size" => $request->input('size')
            ];
        }

        // Save the cart back to session
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Display cart items
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // In your CartController or wherever you're handling the cart logic
    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity')); // Sum the quantity of each item in the cart
        return $cartCount;
    }
}
