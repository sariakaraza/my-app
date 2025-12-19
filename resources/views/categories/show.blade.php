@extends('layouts.app')
@section('title', 'Détails catégorie')
@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="mb-3">{{ $category->name }}</h1>
        <p class="mb-4"><b> Description </b> : {{ $category->description }}</p>
        <p class="mb-4"><b> Slug </b> : {{ $category->slug }}</p>
        <p class="mb-4"><b> Actif ? </b> : {{ $category->is_active ? 'Oui' : 'Non' }}</p>
        <p class="mb-4"><b> Cree le </b> : {{ $category->created_at }}</p>
        <p class="mb-4"><b> Modifié le </b> : {{ $category->updated_at }}</p>

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