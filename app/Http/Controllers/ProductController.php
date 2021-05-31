<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        session_start();
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

        $products = Product::paginate(3);

        return view('allproducts', compact("products"));
    }

    public function addProductToCart(Request $request, $id){
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id, $product);

        $request->session()->put('cart', $cart);

        //dump($cart);

        return redirect()->route('allProducts');
    }

    public function clearCart(Request $request){
            $request->session()->forget('cart');
            //$request->session()->flash();
    }

    public function showCart(){
        session_start();
        $cart = Session::get('cart');
        //if cart is not empty
        if($cart){
            return view('cartProducts', ['cartItems'=> $cart]);
        // if cart is empty
        }else {
            return redirect()->route('allProducts');
        }
    }

    public function deleteItemFromCart(Request $request, $id){
        $cart = $request->session()->get('cart');
        if(array_key_exists($id, $cart->items)){
            unset($cart->items[$id]);
        }

        $prevCart = $request->session()->get('cart');
        $updatedCart = new Cart($prevCart);
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put('cart', $updatedCart);

        return redirect()->route('cartProducts');
    }

    public function openAdmin(){
        return view('admin');
    }
}
