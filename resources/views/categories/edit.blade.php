@extends('layouts.app')
@section('title', 'Modifier la catégorie')
@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="mb-4">Modifier la catégorie</h1>

        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input id="name" name="name" type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $category->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description"
                    class="form-control @error('description') is-invalid @enderror"
                    rows="4">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection