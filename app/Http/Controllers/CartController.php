<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Add to cart method
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        $cart = session()->get('cart', []);
        $quantity = $request->input('quantity', 1);
        $size = $request->input('size', ''); // Default empty string if size is not provided

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "name" => $product->name ?? 'Unknown', // Ensure name is set
                "quantity" => $quantity,
                "price" => $product->price ?? 0, // Ensure price is set
                "image" => $product->image ?? 'default.jpg', // Use a default image if not set
                "size" => $size
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Display cart items
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Update cart item quantity and size
    public function update(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $size = $request->input('size');

        // Update cart session or database as needed
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            $cart[$id]['size'] = $size;
            Session::put('cart', $cart);
        }

        return response()->json(['message' => 'Cart updated successfully.']);
    }

    // Remove item from cart
    public function remove($id)
    {
        // Remove item from cart session or database as needed
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    // Get cart item count
    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        return array_sum(array_column($cart, 'quantity'));
    }
}
