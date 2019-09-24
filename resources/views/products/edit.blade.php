@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2">
               <h2 class="m-4">Modifier un produit</h2>
            </div>
            <div class="col-12">
                <form action="{{ route('products.update', $product) }}" method="POST" rol="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('products._form')
                </form>
            </div>
        </div>
    </div>

@stop