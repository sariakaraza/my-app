@extends('layouts.app')
@section('title', 'Catégories')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Catégories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Nouvelle catégorie</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ Str::limit($category->description, 50) }}</td>
                            <td>
                                <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-info">Voir</a>
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Modifier</a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" on
                                                click="return confirm('Êtes-vous sûr ?')" >Supprimer</button>
                                        </form>
                            </td>
                        </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection