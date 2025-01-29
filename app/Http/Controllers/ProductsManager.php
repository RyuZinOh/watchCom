<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products; 
use Illuminate\View\View; 

class ProductsManager extends Controller
{
    public function index(): View
    {
        $products = Products::latest()->paginate(10);
        return view('products', compact('products')); 
    }
}
