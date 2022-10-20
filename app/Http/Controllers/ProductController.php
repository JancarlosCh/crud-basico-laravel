<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(5);
        return view('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.products.form')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'product' => 'required',
            'description' => 'required',
            'price' => 'required|gte:0',
            'stock' => 'required|gte:0'
        ]);

        $product = [
            'product' => $request['product'],
            'description' => $request['description'],
            'category_id' => $request['category'],
            'price' => $request['price'],
            'stock' => $request['stock']
        ];

        $product = Product::create($product);

        Session::flash('Producto creado correctamente.');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::all();
        $data = [
            'product' => $product,
            'categories' => $categories
        ];

        return view('admin.products.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'product' => 'required',
            'description' => 'required',
            'price' => 'required|gte:0',
            'stock' => 'required|gte:0'
        ]);

        $product->product = $request['product'];
        $product->description = $request['description'];
        $product->category_id = $request['category'];
        $product->price = $request['price'];
        $product->stock = $request['stock'];
        $product->save();

        Session::flash('updated', 'Producto actualizado correctamente.');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        Session::flash('deleted', 'Producto eliminado correctamente.');
        return redirect()->route('products.index');
    }
}
