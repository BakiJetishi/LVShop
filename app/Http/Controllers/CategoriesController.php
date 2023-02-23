<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function manage() {
        return view('dashboard.components.categories.index', [
            'categories' => Categories::all()
        ]);
    }
    
    public function find(Request $request)
    {
        $categoryId = $request->input('categoryId');
        $products = Products::latest()->where('category_id', $categoryId)->get();

        return response()->json($products);
    }

    public function create() {
        return view('dashboard.components.categories.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
        ]);

        Categories::create($formFields);

        return redirect('/admin/dashboard')->with('success', 'Category created successfully!.');
    }

    public function edit(Categories $category) {
        return view('dashboard.components.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Categories $category) {
        $formFields = $request->validate([
            'name' => 'required',
        ]);

        $category->update($formFields);

        return redirect('/admin/dashboard')->with('success', 'Category updated successfully!');
    }

    public function destroy(Categories $category) {
        
        $category->delete();
        
        return redirect('/admin/dashboard')->with('success', 'Category deleted successfully!.');;
    }
}