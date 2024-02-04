<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEditCategoryRequest;
use App\Http\Requests\CreateEditTaskRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::all();
        return view('category.index',compact('categories'));
    }
    
    function create(){
        $category = new Category();
        return view('forms.createEditCategory',compact('category'));
    }

    function edit(Category $category){
        return view('forms.createEditCategory',compact('category'));
    }

    function storeEdit(CreateEditCategoryRequest $request, Category $category=null){
        $category= $category ?? new Category();
        $category->name = $request->name;
        $category->color = $request->color;
        $category->save();
        return redirect()->route('category.index');
    }

    function delete(Category $category){
        $category->delete();
        return redirect()->route('category.index');
    }
}
