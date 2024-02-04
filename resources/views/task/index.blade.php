@extends('layout.app')
@section('title','Tâches')
@section('content')

    <div class="d-flex flex-row justify-content-between align-items-center">
        <h1>Tâches:</h1>
        <a href="{{ route('task.create') }}" class="btn btn-primary">Ajouter</a>
    </div>

    <div class="d-flex">
        @foreach ($tasks as $task)
        <div class="card">
            <div class="card-header">
                {{$task->name}}
            </div>
            <div class="card-body">
                {{ \Carbon\Carbon::parse($task->date)->format('Y-m-d H:i') }}
                @if ($task->category)
                <div style="width:100%; height:50px; background-color:{{$task->category->color}}; margin-top:10px; margin-bottom:10px; border-radius:5px; display:flex; justify-content:center; align-items:center;">
                    {{$task->category->name}}
                </div>
                @endif
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('task.destroy', $task->id) }}" method="post">
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