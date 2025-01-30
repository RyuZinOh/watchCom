<?php

namespace App\Http\Controllers;

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
    function addTocart($id){
        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $id;
    
        if ($cart->save()) {
            // Flash success message along with the product id
            return redirect()->back()->with('success', [
                'message' => 'Product added to cart successfully!',
                'product_id' => $id
            ]);
        }
    
        return redirect()->back()->with('fail', 'Something went wrong');
    }
    
}
