<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with('creator:id,name')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_code' => 'nullable|string|max:50|unique:categories,category_code',
            'description'   => 'nullable|string',
            'status'        => 'required|in:0,1',
            'created_by'    => 'nullable|string|max:255',
        ]);

        $authId = Auth::user()->id;

        try {
            $category = Category::create([
                'category_name' => $request->category_name,
                'category_code' => $request->category_code,
                'description'   => $request->description,
                'status'        => $request->status,
                'created_by'    => $authId,
            ]);

            return redirect()->route('categories.create')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {

            Log::error('An error occurred for Store Category: ' . $e->getMessage());

            return back()->withErrors('Something went wrong while creating the category.')->withInput();
        }
    }
}
