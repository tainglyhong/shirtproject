<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'size' => 'required|string'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $validated['quantity'];
            $cart[$id]['size'] = $validated['size'];

            // Optionally log the updated cart data for debugging
            Log::info('Cart updated:', $cart);

            session()->put('cart', $cart);
            return response()->json(['message' => 'Cart updated successfully']);
        }

        return response()->json(['message' => 'Item not found in cart'], 404);
    }

    // Remove item from cart
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product removed from cart!');
        }

        return redirect()->back()->with('error', 'Product not found in cart!');
    }

    // Get cart item count
    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        return array_sum(array_column($cart, 'quantity'));
    }
}
