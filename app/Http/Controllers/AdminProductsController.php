<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class AdminProductsController extends Controller
{
    public function index(){

        $products = Product::all();

        return view('admin.displayProducts', ['products' => $products]);
    }

    //display edit product form
    public function editProductForm($id){
        $product = Product::find($id);
        return view('admin.editProductForm', ['product' => $product]);
    }

    //display edit product image form
    public function editProductImageForm($id){
        $product = Product::find($id);
        return view('admin.editProductImageForm', ['product' => $product]);
    }

    public function updateProductImage(Request $request, $id){
        Validator::make($request->all(), ['image' => "required|image|mimes:jpg,png,jpeg|max:5000"])->validate();

        if($request->hasFile('image')){
            $product = Product::find($id);
            //delete old image
            $exists = Storage::disk('local')->exists("public/images/$product->image");
            if($exists){
                Storage::delete('public/images/' . $product->image);
            }
            //upload new image
            $ext = $request->file('image')->getClientOriginalExtension(); // e.g.: jpg
            $request->image->storeAs('public/images/', $product->image);

            $arrayToUpdate = array('image' => $product->image);
            DB::table('products')->where('id', $id)->update($arrayToUpdate);

            return redirect()->route('adminDisplayProducts');
        } else {
            return 'no image was selected';
        }
    }

    public function updateProduct(Request $request, $id){
        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');
        $price = substr($request->input('price'), 1);

        $arrayToUpdate = array('name' => $name, 'description' => $description, 'type'=> $type, 'price'=> $price);
        DB::table('products')->where('id', $id)->update($arrayToUpdate);

        return redirect()->route('adminDisplayProducts');
    }

    public function createProductForm(){
        return view('admin.createProductForm');
    }

    public function insertProduct(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');
        $price = $request->input('price');

        $this->validate($request,
            [
            'name' => "required|min:5",
            'description' => "required",
            'type' => "required",
            'image' => "required|image|mimes:jpg,png,jpeg|max:5000"
            ],
            [
                'name.required' => 'The name is required',
                'name.min' => 'The name must has at least 5 chars',
                'description.required' => 'The description is required',
                'type.required' => 'The type is required',
                'image.required' => 'The image is required',
                'image.image' => 'This should be an image file',
                'image.mimes' => 'The allowed extensions: jpg,png,jpeg',
                'image.max' => 'The allowed file size is 5000 bite'
            ]);

        $image = $request->file('image');
        $fileName = str_replace(' ', '', $request->input('name')) . '.' . $image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());
        $img->resize(120, 120, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('local')->put('public/images/'. $fileName, $img); // or File::get($request->image) instead of $img

        $arrayToInsert = array('name'=>$name, 'description' =>$description, 'type' => $type, 'image' => $fileName, 'price' => $price);
        DB::table('products')->insert($arrayToInsert);

        return redirect()->route('adminDisplayProducts');
    }

    public function deleteProduct($id){
        $product = Product::find($id);

        //delete picture from storage
        $exists = Storage::disk('local')->exists("public/images/$product->image");
        if($exists){
            Storage::delete('public/images/' . $product->image);
        }
        //delete product from database
        DB::table('products')->delete($id); // also possible way: Product::destroy($id)

        return redirect()->route('adminDisplayProducts');
    }
}

