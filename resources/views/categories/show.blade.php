@extends('layouts.app')
@section('title', 'Détails catégorie')
@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="mb-3">{{ $category->name }}</h1>
        <p class="mb-4">{{ $category->description }}</p>

        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Modifier</a>

        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr ?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Supprimer</button>
        </form>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>
    </div>
</div>
@endsection