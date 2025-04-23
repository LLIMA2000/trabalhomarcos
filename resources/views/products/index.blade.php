@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
    <h2 class="text-center mb-4">Produtos Disponíveis</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <a href="{{ asset('storage/' . $product->image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $product->image_path) }}" class="card-img-top" alt="{{ $product->name }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('styles')
    <style>
        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
    </style>
@endsection