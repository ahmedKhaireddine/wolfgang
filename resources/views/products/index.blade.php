@extends('layouts.index', ['title' => 'Nos produits'])

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="row my-4">
                    <div class="col-6">
                        <h1 class="ml-5">Nos produits</h1>
                    </div>
                    <div class="col-6 text-center">    
                        <a href="{{ route('products.create') }}" class="btn btn-primary mt-2">Ajouter un produit</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @if(!$products->isEmpty())
                <div class="container">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-12 col-md-6 col-lg-4 ">
                                <div class="card my-3">
                                    <img src="{{ asset($product->picture) }}" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Voir les detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="offset-3 col-sm-4">
                        <div class="text-center mt-5">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
                @else
                <p>Aucune produit pour le moment.</p>
                @endif 
            </div>
        </div>
    </div>
@stop
