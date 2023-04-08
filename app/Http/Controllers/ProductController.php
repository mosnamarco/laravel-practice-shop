<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //gets the id of the authenticated user
        $user = Auth::user();
        $admin = false;
        // get all the products
        $products = Product::all();
        // if there is an authenticated user, check if admin
        // if yes, get only the products with his id
        if ($user != null) {
            if ($user->isAdmin) {
                $admin = true;
                $products = Product::where('user_id', '=', $user->id)->get();
            }
        }
        //pass the data to the view
        return view('shop', ['products' => $products, 'admin' => $admin]);
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('editProduct', ['product' => $product]);
    }

    public function store(Request $request)
    {
        // get the filename of image uploaded
        $filename = $request->img->getClientOriginalName();
        // store in public folder
        $request->img->move(public_path('img'), $filename);


        $product = Product::create([
            'product_name' => $request['product_name'],
            'price' => $request['product_price'],
            'img' => $filename,
            'user_id' => Auth::id()
        ]);
        return redirect('shop');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addProduct');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->hasFile('img')) {
            $filename = $request->photo->getClientOriginalName();
            $request->img->move(public_path('img'), $filename);
        } else {
            $filename = $product->img;
        }
        $product->product_name = $request->product_name;
        $product->price = $request->product_price;
        $product->img = $filename;
        $product->save();
        return redirect("shop");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


        $product = Product::find($id);


        $product->delete();
        return redirect("shop");
    }

}
