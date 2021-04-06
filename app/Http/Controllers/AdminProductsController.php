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

    //display edit product form
    public function editProductForm($id){
        $product = Product::find($id);
        return view('admin.editProductForm', ['products' => $product]);
    }

    //display edit product image form
    public function editProductImageForm($id){
        $product = Product::find($id);
        return view('admin.editProductImageForm', ['products' => $product]);
    }
}

