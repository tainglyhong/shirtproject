<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.dashboard',['products' => $products]);
    }

    public function shop()
    {
        $products = Product::all();
        return view('shop_page', ['products' => $products]);
    }
    
    
}
