<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequest;
use App\Http\Requests\EditRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $product= new Product();
        $product->fill($request->all());
        $product->save();
        return redirect()->route('product');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();
        return redirect()->route('product');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
   {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product');
    }

    public function search(Request $request)
    {
        $search= $request->keyword;
        $products = Product::where('name','LIKE',"%$search%")->get();
        return view('product.index',compact('products'));
    }

}
