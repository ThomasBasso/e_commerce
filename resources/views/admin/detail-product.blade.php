@extends('layouts.app')

@section('style')
    <style>

    </style>

@endsection

@section('content')

    @if(isset($product))

        <form method="POST" action="{{ route('admin.products.update', $product->id) }}">
        @method('PUT')
            @csrf
            <label for="title">Titre:</label>
            <input type="text" id="title" name="title" value="{{ $product->title }}">

            <label for="detail">Détail:</label>
            <textarea id="detail" name="detail">{{ $product->detail }}</textarea>

            <label for="price">Prix:</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}">

            <label for="quantity">Quantité:</label>
            <input type="number" id="quantity" name="quantity" value="{{ $product->quantity }}">

            <button type="submit">Modifier</button>
            <a href="{{ route('admin.products.index') }}"> Annuler</a>
        </form>

    @else

        <form method="POST" action="{{ route('admin.products.store') }}">
            @csrf
            <label for="title">Titre:</label>
            <input type="text" id="title" name="title" >

            <label for="detail">Détail:</label>
            <textarea id="detail" name="detail"></textarea>

            <label for="price">Prix:</label>
            <input type="number" id="price" name="price" >

            <label for="quantity">Quantité:</label>
            <input type="number" id="quantity" name="quantity" >

            <button type="submit">Créer</button>
            <a href="{{ route('admin.products.index') }}"> Annuler</a>
        </form>


    @endif


@endsection
