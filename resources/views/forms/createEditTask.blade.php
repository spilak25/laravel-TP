@extends('layout.app')
@section('title','Accueil')
@section('content')
    <div class="d-flex align-items-center justify-content-center w-100">
        <form action="{{ $task && $task->id ? route('task.update', $task->id) : route('task.store') }}" id="taskForm" method="POST">
            @csrf
            @if($task && $task->id)
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
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $task->name )}}">
            </div>
            <div class="form-group">
                @php
                    use Carbon\Carbon;
                    $date = $task->date ? Carbon::parse($task->date) : Carbon::now()->addHour();            
                @endphp

                <label for="date">Date:</label>
                <input type="datetime-local" {{ $task->id ? 'disabled' : '' }} class="form-control" name="date" id="date" value="{{ old('date', isset($date) ? $date->format('Y-m-d\TH:i') : '') }}">
            </div>
            <div class="form-group">
                <label for="category_id">Categorie:</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">Aucune</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection


