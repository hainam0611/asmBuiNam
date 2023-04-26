<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(4);
        return view('products.index', compact('products'));
    }
    public function index2()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function shop()
    {
        $products = Product::with('category')->latest()->get();
        return view('products.shop', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = Product::with('category')
            ->where('prodname', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")
            ->latest()
            ->get();

        return view('products.search', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'prodname' => 'required|string|max:255|unique:products,prodname',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max   :2048',
            'price' => 'required|numeric',
        ], [
            'price.numeric' => 'The price must be a certain number.',
            'prodname.unique' => 'This product name is already taken.',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Product::create($input);

        return redirect()->route('admin.products.index')->with('msg', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'prodname' => 'required|string|max:255|unique:products,prodname,' . $product->id,
            'content' => 'required|string|max:255',
            'category_id' => 'required|exists:App\Models\Category,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric|min:0',
        ],[

            'price.numeric' => 'The price must be a certain number.',
            'prodname.unique' => 'This product name is already taken.',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        $product->update($input);

        return redirect()->route('admin.products.index')->with('msg', 'Product Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('msg', 'Product Delete Successfully');
    }
}
