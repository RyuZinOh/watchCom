<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products; 
use Illuminate\View\View; 

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
}
