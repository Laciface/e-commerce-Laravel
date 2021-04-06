<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        /**
         * example without database
         */
        /*$products = [
            0 => ['name' => 'Iphone', 'category' => 'smart phone', 'price' => 1000],
            1 => ['name' => 'Galaxy', 'category' => 'tablet', 'price' => 2000],
            2 => ['name' => 'Sony', 'category' => 'TV', 'price' => 3000],
        ];*/

        /**
         * get data direct from database
         *
         */
        /*$products = DB::table('products')->get();*/

        /**
         * get data indirect from database with model
         *
         */

        $products = Product::all();

        return view('allproducts', compact("products"));
    }

    public function addProductToCart(Request $request, $id){
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id, $product);

        $request->session()->put('cart', $cart);

        dump($cart);
    }
}
