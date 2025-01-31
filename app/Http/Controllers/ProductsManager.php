<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Products; 
use Illuminate\View\View; 
use App\Models\Cart;

class ProductsManager extends Controller
{
    public function index(): View
    {
        $products = Products::latest()->paginate(6);
        return view('products', compact('products')); 
    }

    function details($slug){
        $product = Products::where('slug', $slug)->first();
        return view('details', compact('product'));
    }
 
    function addTocart($id) {
        $cart = Cart::where('product_id', $id)
                    ->where('user_id', auth()->user()->id)
                    ->first();
    
        if ($cart) {
            $cart->quantity += 1;
        } else {
            $cart = new Cart();
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $id;
            $cart->quantity = 1;
        }
        if ($cart->save()) {
            return redirect()->back()->with('success', [
                'message' => 'Product added to cart successfully!',
                'product_id' => $id
            ]);
        }
    
        return redirect()->back()->with('fail', 'Something went wrong');
    }
    

    public function showCart(){
        $cartItems = DB::table('cart')
            ->select('product_id', DB::raw('sum(quantity) as quantity')) // Sum the quantity
            ->where('user_id', auth()->user()->id)
            ->groupBy('product_id')
            ->get();
    
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $product = Products::find($item->product_id);
            $totalPrice += $product->price * $item->quantity;
        }
    
        return view('cart', compact('cartItems', 'totalPrice'));
    }
    
    public function updateCartQuantity(Request $request, $id)
    {
        $cart = Cart::where('product_id', $id)
                    ->where('user_id', auth()->user()->id)
                    ->first();
        
        if ($cart) {
            if ($request->action === 'increment') {
                $cart->quantity += 1;
            } elseif ($request->action === 'decrement' && $cart->quantity > 1) {
                $cart->quantity -= 1;
            }
            $cart->save();
        }

        return redirect()->route('cart.show');
    }

    public function removeCartItem($id)
    {
        Cart::where('product_id', $id)
            ->where('user_id', auth()->user()->id)
            ->delete();

            return redirect()->route('cart.show')->with('success', [
                'message' => 'Product removed from cart.'
            ]);
    }
    
}
