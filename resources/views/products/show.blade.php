@extends('layouts.index')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12">
            <h2 class="m-4 ">Detail de produit</h2>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-5 my-3">
                    <img src="{{ asset($product->picture) }}" alt="photo moto {{ $product->name }}" class="img-fluid">
                </div>
                <div class="col-12 col-md-6 col-lg-7">
                    <h2>{{ $product->name }}</h2>
                    <h3>Ref: {{ $product->reference }}</h3>
                    <p>{{ $product->description }}</p>
                    <p><strong>Prix : {{ $product->price }}</strong></p>
                    <a href="{{ route('products.index') }}" class="btn btn-danger"> << Precedent</a>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-danger">Modifier</a>
                    <form 
                        action="{{ route('products.destroy', $product) }}" 
                        method="POST" 
                        class="d-inline-block"
                        onsubmit=" return confirm('Etes vous sur ?'); "
                    >
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="supprimer" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>

</div>

@stop