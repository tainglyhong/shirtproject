<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function create()
    {
        return view('Products.create');
    }
    public function show($id)
    {
        $product = Product::find($id);
        // Prepare additional data
        $product->available_sizes = ['S', 'M', 'L', 'XL']; // Example sizes

        return view('Products.show', ['product' => $product]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',

            'image' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/images'), $filename);
            $data['image'] = 'uploads/images/' . $filename;
        }

        $data['p_id'] = Auth::id();

        Product::create($data);

        return redirect(route('admin.dashboard'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048', // Image is optional during update
        ]);

        // If a new image is uploaded, handle the file upload
        if ($request->hasFile('image')) {
            // Delete the old image file from the server if it exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            // Upload new image
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/images'), $filename);
            $data['image'] = 'uploads/images/' . $filename;
        }

        // Update product with the new data
        $product->update($data);

        return redirect(route('admin.dashboard'))->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // If the product has an image, delete the image file
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        // Delete the product from the database
        $product->delete();

        return redirect(route('admin.dashboard'))->with('success', 'Product deleted successfully.');
    }
}
