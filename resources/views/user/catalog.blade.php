@extends('layouts.app')

@section('style')
    <style>

    </style>

@endsection

@section('content')

<div>
    <h4>Catalogue</h4>

    <ul>
        @foreach($products as $product)
            <li>
                <a href="{{ route('catalog.product', $product->id) }}">
                    {{ $product->title }} - {{ $product->price }} €
                </a>
            </li>
        @endforeach
    </ul>


</div>

@endsection
