@extends('layouts.app')
@section('title', 'Produits')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Produits</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Nouveau produit</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2, ',', ' ') }} €</td>
                    <td>{{ $product->category ? $product->category->name : '-' }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">Voir</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Aucun produit</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $products->links() }}
@endsection