<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function showRegForm(){
        return view('auth.register');
    }

    public function registration(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));

        try {
            Validator::make($request->all(), [
                'name' => 'required|min:4',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5'
            ],
                [
                    'name.required' => 'Name is required',
                    'name.min' => 'name must has at least 4 chars',
                    'email.required' => 'Email is required',
                    'email.email' => 'This is not a valid email address',
                    'email.unique' => 'This email address has already taken',
                    'password.required' => 'Password is required',
                    'password.min' => 'Password must has at least 5 chars'
                ]
            )->validate();
        } catch (ValidationException $e) {
            return $e;
        }

        $arrayToInsert = array('name'=>$name, 'email' =>$email, 'password'=> $password);
        DB::table('users')->insert($arrayToInsert);

        return redirect()->route('allProducts');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        session_start();
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->plainTextToken;
            $user = auth()->user();
            $products = Product::all();
            $_SESSION['user'] = $user->name;

            return view('allproducts', compact( "user", "products"));
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        Auth::logout();
        return redirect()->route('allProducts');
    }

}
