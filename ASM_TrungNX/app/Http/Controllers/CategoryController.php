<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function category()
    {
        $categories = Category::all();
        return view('products.catindex', compact('categories'));
    }

    public function catindex(Request $request)
    {
        $category = Category::find($request->id);
        if ($category) {
            $products = $category->products;
            return view('products.catindex', compact('category', 'products'));
        } else {
            return redirect()->back()->with('error', 'Category not found');
        }
    }


    public function create()
    {
        return view('admin.categories.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'catname' => 'required|unique:categories|max:255',
        ]);

        $category = new Category;
        $category->catname = $request->catname;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    }


    // public function show(string $id)
    // {
    //     $category = Category::find($id);
    //     $productCount = $category->products->count();
    //     return redirect()->route('products.index', ['category' => $category->id, 'productCount' => $productCount]);
    // }
    public function show2(Category $category)
    {
        $products = $category->products;
        return view('products.catindex', compact('category', 'products'));
    }

    public function view(Category $category)
    {
        $products = $category->products;
        if ($products) {
            return view('products.catindex', compact('products', 'category'));
        } else {
            return redirect()->back()->with('error', 'Category not found');
        }
    }

    public function edit(Category $category)
    {
        return view('admin.categories.editCat', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'catname' => 'required|string|max:255',
        ]);

        $category->update([
            'catname' => $request->catname,
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category has been deleted successfully');
    }
}
