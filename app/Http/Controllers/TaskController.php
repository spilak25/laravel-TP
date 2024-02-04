<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEditTaskRequest;
use App\Models\Category;
use App\Models\Task;

class TaskController extends Controller
{
    function index(){
        $tasks = Task::all();
        return view('task.index',compact('tasks'));
    }
    
    function create(){
        $task = new Task();
        $categories = Category::all();
        return view('forms.createEditTask',compact('task', 'categories'));
    }

    function edit(Task $task){
        $categories = Category::all();
        return view('forms.createEditTask',compact('task', 'categories'));
    }

    function storeEdit(CreateEditTaskRequest $request, Task $task=null){
        $task= $task ?? new Task();
        $task->name = $request->name;
        $task->date = $request->date ?? $task->date ?? now();
        $task->category_id = $request->category_id; 
        $task->save();
        return redirect()->route('task.index');
    }

    function delete(Task $task){
        $task->delete();
        return redirect()->route('task.index');
    }
}
