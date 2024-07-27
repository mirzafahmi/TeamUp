<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SportCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.submit-category');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable'
        ]);

        $category = Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Sport Category is created successfullly');
    }

    public function show(Category $category)
    {

    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit-category', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable'
        ]);

        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Sport Category is updated successfullly');
    }

    public function destroy(Category $category){

        $name = $category->name;

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', "'{$name}' Category is deleted successfullly");
    }
}
