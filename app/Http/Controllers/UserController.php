<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function showRegForm(){
        return view('auth.register');
    }

    public function registration(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));

        Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password'=> 'required|min:5'
        ])->validate();


        $arrayToInsert = array('name'=>$name, 'email' =>$email, 'password'=> $password);
        DB::table('users')->insert($arrayToInsert);

        return redirect()->route('allProducts');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->plainTextToken;
            $user = auth()->user();
            $products = Product::all();
            return view('allproducts', compact("token", "user", "products"));
            /*return response()->json([
                'token' => $token,
                'user' => auth()->user(),
                'email' => $request->email
            ], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);*/
        }
    }
}
