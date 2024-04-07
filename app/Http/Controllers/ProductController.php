<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('products.index',compact('products'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Go to the create view
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data from form fields
        $request->validate([
            'name'=>'required',
            'price'=>'required|min:0',
            'quantity'=>'required|min:0',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $input = $request->all();
        if($image = $request->file('image')){
            $path = 'public/images';
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs($path,$filename);
            $input['image']=$filename;
        }
        Product::create($input);

        return redirect()->route('products.index')->with(
            ['message'=>'Product Created successfully',
             'status'=>'success'
           ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'name'=>'required',
            'price'=>'required|min:0',
            'quantity'=>'required|min:0',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //remove existing file
        if(Storage::exists('public/images/'.$product->image)){
            Storage::delete('public/images/'.$product->image);
        }
        //proceed to insert new file
        $input = $request->all();

        if($image = $request->file('image')){
            $path = 'public/images';
            $filename = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->storeAs($path,$filename);
            $input['image']=$filename;
        }else{
            unset($input['image']);
        }
        $product->update($input);
        return redirect()->route('products.index')->with(['message'=>'Update was successfull',
           'status'=>'warning'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        Storage::delete('public/images/'.$product->image);
        $product->delete();
        return redirect()->route('products.index')->with(['message'=>'Product deleted successfully',
          'status'=>'danger'
    ]);

    }
}
