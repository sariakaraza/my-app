@extends('layouts.app')
@section('title', 'Détails produit')
@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="mb-3">{{ $product->name }}</h1>
        <p class="mb-2"><b>Prix</b> : {{ number_format($product->price, 2, ',', ' ') }} €</p>
        <p class="mb-2"><b>Catégorie</b> : {{ $product->category?->name ?? '—' }}</p>
        <p class="mb-4"><b>Description</b> : {{ $product->description ?? 'Aucune' }}</p>

        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Modifier</a>

        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr ?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Supprimer</button>
        </form>

        <a href="{{ route('products.index') }}" class="btn btn-secondary">Retour</a>
    </div>
</div>
@endsection