<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(3);
        return view ('products.index',['products'=>$products]);
    }

    public function create(){
        return view ('products.create');
    }

    public function store(Request $req){

        // validate data 
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,gif | max:10000',
        ]);

        // upload image
        $imageName = time().'.'.$req->image->extension();
        $req->image->move(public_path('products'), $imageName);

        $product = new Product;
        $product->image = $imageName;

        $product->name = $req->name;
        $product->description = $req->description;

        $product->save();

        return back()->withSuccess('Product Created !');
    }

    public function edit($id){
        $product = Product::where('id',$id)->first();
        return view('products.edit',['product' => $product]);
    }

    public function update(Request $req, $id){
        // validate data 
        $req->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable | mimes:jpeg,jpg,png,gif | max:10000',
        ]);

        $product = Product::where('id', $id)->first();

        if($req->image){
            // upload image
            $imageName = time().'.'.$req->image->extension();
            $req->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $req->name;
        $product->description = $req->description;

        $product->save();

        return back()->withSuccess('Product Updated !');
    }

    public function destroy($id){
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted !');
    }

    public function show($id){
        $product = Product::where('id', $id)->first();
        return view('products.show' ,['product' => $product]);
    }
}
