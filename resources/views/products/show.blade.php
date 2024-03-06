@extends('layouts.app')
@section('main')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-4 ">
                <div class="card shadow p-4">
                        <p> Product Name : <strong>{{ $product->name }}</strong></p>
                        <p> Product Description : <strong>{{ $product->description }}</strong></p>
                        <img src="/products/{{ $product->image }}" class=" rounded " alt="">
                </div>
            </div>
        </div>
    </div>

@endsection