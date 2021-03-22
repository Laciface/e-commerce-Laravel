<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        /*$products = [
            0 => ['name' => 'Iphone', 'category' => 'smart phone', 'price' => 1000],
            1 => ['name' => 'Galaxy', 'category' => 'tablet', 'price' => 2000],
            2 => ['name' => 'Sony', 'category' => 'TV', 'price' => 3000],
        ];*/

        $products = DB::table('products')->get();
        return view('allproducts', compact("products"));
    }
}
