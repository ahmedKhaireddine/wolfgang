<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\ProductsResourceCollection;
use App\Http\Requests\ProductFormRequest;
use App\Traits\UploadTrait;

class ProductsApiController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return ProductsResourceCollection
     */
    public function index() : ProductsResourceCollection
    {
        return new ProductsResourceCollection(Products::paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ProductsResource
     */
    public function store(ProductFormRequest $request) : ProductsResource
    {
        $picture = $request->picture;
        $name = str_slug($request->name).'_'.time();
        $folder = '/uploads/images/';
        $filePath = "http://localhost:8888/cours-laravel/Wolfgang/public". $folder . $name . '.' . $picture->getClientOriginalExtension();
        $this->uploadOne($picture, $folder, 'public', $name);

        $product = Products::create(
            [
                'name' => $request->name, 
                'reference' => $request->reference, 
                'picture' => $filePath, 
                'price' => $request->price, 
                'description' => $request->description,
            ]
        );

        return new ProductsResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ProductsResource
     */
    public function show(Products $product) : ProductsResource 
    {
        return new ProductsResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return ProductsResource
     */
    public function update(ProductFormRequest $request, Products $product): ProductsResource
    {
        $picture = $request->picture;
        $name = str_slug($request->name).'update_'.time();
        $folder = '/uploads/images/';
        $filePath = "http://localhost:8888/cours-laravel/Wolfgang/public". $folder . $name . '.' . $picture->getClientOriginalExtension();
        $this->uploadOne($picture, $folder, 'public', $name);

        $product->update(
            [
                'name' => $request->name, 
                'reference' => $request->reference, 
                'picture' => $filePath, 
                'price' => $request->price, 
                'description' => $request->description,
            ]
        );

        return new ProductsResource($product);
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

        return response()->json();
    }
}
