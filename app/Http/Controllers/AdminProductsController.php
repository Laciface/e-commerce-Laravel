<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    public function index(){

        $products = Product::all();

        return view('admin.displayProducts', ['products' => $products]);
    }
}
