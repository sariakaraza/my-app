@extends('layouts.app')
@section('title', 'Produits')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Produits</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Nouveau produit</a>
</div>

<form method="GET" class="row g-2 mb-3">
    <div class="col-auto">
        <select name="category_id" class="form-select">
            <option value="">Toutes les catégories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }} ({{ $cat->products_count }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-auto">
        <input type="search" name="q" value="{{ request('q') }}" class="form-control" placeholder="Recherche par nom">
    </div>

    <div class="col-auto">
        <select name="sort" class="form-select">
            <option value="">Trier</option>
            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Prix décroissant</option>
        </select>
    </div>

    <div class="col-auto">
        <button class="btn btn-secondary">Appliquer</button>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Réinitialiser</a>
    </div>
</form>

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
                <td>{{ $product->category?->name ?? '—' }}</td>
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
            <tr><td colspan="4">Aucun produit trouvé</td></tr>
        @endforelse
    </tbody>
</table>

{{ $products->links() }}
@endsection