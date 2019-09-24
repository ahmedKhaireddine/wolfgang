<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UploadTrait;


class ProductsController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::paginate(3);
        // dd($products);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Products;
        return view('products.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $picture = $request->picture;
        $name = str_slug($request->name).'_'.time();
        $folder = '/uploads/images/';
        $filePath = 'http://localhost:8888/cours-laravel/Wolfgang/public'.$folder . $name . '.' . $picture->getClientOriginalExtension();
        $this->uploadOne($picture, $folder, 'public', $name); 

        Products::create([
            'name' => $request->name, 
            'reference' => $request->reference, 
            'picture' => $filePath, 
            'price' => $request->price, 
            'description' => $request->description,
            ]);
        return Redirect::route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, Products $product)
    {
        $picture = $request->picture;
        $name = str_slug($request->name).'_'.time();
        $folder = '/uploads/images/';
        $filePath = 'http://localhost:8888/cours-laravel/Wolfgang/public'.$folder . $name . '.' . $picture->getClientOriginalExtension();
        $this->uploadOne($picture, $folder, 'public', $name);

        $product->update([
            'name' => $request->name, 
            'reference' => $request->reference, 
            'picture' => $filePath, 
            'price' => $request->price, 
            'description' => $request->description,
        ]);

        return Redirect::route('products.show', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return Redirect::route('products.index');
    }
}
