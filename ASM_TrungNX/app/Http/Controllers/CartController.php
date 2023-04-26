<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::all();
        $totalPrice = $this->getTotalPrice($cartItems);
        return view('products.cart', compact('cartItems', 'totalPrice'));
    }
    

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity', 1);
        $cartItem = CartItem::where('product_id', $product->id)->first();
        
        if (!$cartItem) {
            // Nếu sản phẩm chưa có trong giỏ hàng, tạo một bản ghi mới
            $cartItem = new CartItem;
            $cartItem->product_id = $product->id;
            $cartItem->name = $product->prodname;
            $cartItem->quantity = $quantity;
            $cartItem->price = $product->price;
        } else {
            // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng sản phẩm đó
            $cartItem->quantity += $quantity;
        }
        
        $cartItem->save();
    
        $totalPrice = $this->getTotalPrice(CartItem::all());
        
        return redirect()->route('products.cart')->with('success', 'Product added to cart.')->with('totalPrice', $totalPrice);
    }
    

    public function remove($id)
   {
    $cartItem = CartItem::findOrFail($id);
    $cartItem->delete();

    $cartItems = Session::get('products.cart', []);
    foreach ($cartItems as $key => $item) {
        if ($item['id'] == $id) {
            unset($cartItems[$key]);
            break;
        }
    }

    Session::put('products.cart', $cartItems);

    $totalPrice = $this->getTotalPrice(CartItem::all());

    return redirect()->route('products.cart')->with('success', 'Product removed from cart.')->with('totalPrice', $totalPrice);
    }


  

    private function getTotalPrice($cartItems)
    {
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }
}