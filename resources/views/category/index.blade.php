@extends('layout.app')
@section('title','Catégories')
@section('content')

    <div class="d-flex flex-row justify-content-between align-items-center">
        <h1>Catégories:</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary">Ajouter</a>
    </div>

    <div class="d-flex">
        @foreach ($categories as $category)
        <div class="card">
            <div class="card-header">
                {{$category->name}}
            </div>
            <div class="card-body" style="background-color: {{$category->color}}; width: 100%; height: 100px;">
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
