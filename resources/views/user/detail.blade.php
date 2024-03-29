@extends('layouts.app')

@section('style')
    <style>

    </style>

@endsection

@section('content')

    <div>
        <h1>{{ $product->title }}</h1>
        <p>Détails : {{ $product->detail }}</p>
        <p>Prix : {{ $product->price }}</p>
        <p>Quantité disponible : {{ $product->quantity }}</p>

        <form method="POST" action="">
            @csrf
            <label for="quantity">Quantité à ajouter au panier:</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->quantity }}">
            <button type="button">Ajouter au panier</button>
        </form>
    </div>

@endsection
