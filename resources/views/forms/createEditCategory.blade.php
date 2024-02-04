@extends('layout.app')
@section('title','Accueil')
@section('content')
    <div class="d-flex align-items-center justify-content-center w-100">
        <form action="{{ $category && $category->id ? route('category.update', $category->id) : route('category.store') }}" id="categoryForm" method="POST">
            @csrf
            @if($category && $category->id)
                @method('PUT')
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $category->name )}}">
            </div>
            <div class="form-group">
                <label for="category_id">Couleur:</label>
                <input type="color" class="form-control" name="color" id="color" value="{{ old('color', $category->color )}}">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection


