@extends('layouts.app')

@section('style')
    <style>

    </style>

@endsection

@section('content')

    <div>

        <a href="{{ route('admin.products.new') }}" >Ajouter un produit</a>

        <h2>Listes des produits</h2>

        <div>
            <table>
                <thead>
                <tr>
                    <th>Titre</th>
                    <th>Détail</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->detail }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>

                            <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Supprimer</button>
                            </form>

                            <a href="{{ route('admin.products.edit', $product->id) }}">Modifier</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection
