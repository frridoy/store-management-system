<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::select('id', 'category_code', 'category_name')->where('status', 1)->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'sold_quantity' => 'nullable|integer|min:0',
            'available_quantity' => 'nullable|integer|min:0',
            'sku' => 'required|string|unique:products,sku',
            'status' => 'required|boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {

            $product = Product::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'stock_quantity' => $request->stock_quantity,
                'sold_quantity' => $request->sold_quantity,
                'available_quantity' => $request->available_quantity,
                'sku' => $request->sku,
                'status' => $request->status,
            ]);

            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $image) {

                    if ($image->isValid()) {

                        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                        $extension = $image->getClientOriginalExtension();
                        $random = rand(1, 1000);

                        $imageName = $originalName . '_' . $random . '.' . $extension;

                        $image->move(public_path('uploads/products'), $imageName);

                        $product->images()->create([
                            'image_path' => $imageName,
                        ]);
                    }
                }
            }

            return redirect()->route('products.create')->with('success', 'Product created successfully!');

        } catch (\Exception $e) {
            Log::error('An error occurred for Store Product: ' . $e->getMessage());
            return back();
        }
    }
}
