@extends('layouts.app')
@section('title', 'Modifier le produit')
@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="mb-4">Modifier le produit</h1>

        <form method="POST" action="{{ route('products.update', $product) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input id="name" name="name" type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $product->name) }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input id="price" name="price" type="number" step="0.01"
                    class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price', $product->price) }}" required>
                @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Catégorie</label>
                <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                    <option value="">-- Choisir --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>
@endsection