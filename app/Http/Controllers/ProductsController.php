<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index() {
        return view('components.products', [
            'products' => Products::latest()->filter(request(['search']))->simplePaginate(6),
            'categories' => Categories::all()
        ]);
    }

    public function show(Products $product) {
        return view('components.show', [
            'product' => $product,
        ]);
    }

    public function create() {
        return view('dashboard.components.create', [
            'categories' => Categories::all()
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('images', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Products::create($formFields);

        return redirect('/admin/dashboard')->with('success', 'Product created successfully!.');
    }

    public function edit(Products $product) {
        return view('dashboard.components.edit', [
            'product' => $product,
            'categories' => Categories::all()
        ]);
    }

    public function update(Request $request, Products $product) {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);

        if($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('images', 'public');
        }

        $product->update($formFields);

        return redirect('/admin/dashboard')->with('success', 'Product updated successfully!');
    }

    public function destroy(Products $product) {
        $product->delete();
        return redirect('/admin/dashboard')->with('success', 'Product deleted successfully!.');;
    }

    public function manage() {
        return view('dashboard.components.products', [
            'products' => Products::orderBy('created_at', 'desc')->get()
        ]);
    }

}