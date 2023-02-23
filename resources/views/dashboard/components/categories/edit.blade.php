@extends('dashboard.home')

@section('content')    
<div class="bg-gray-50 border border-gray-200 rounded p-10 max-w-lg mx-auto mt-24">
  <header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">Edit category</h2>
  </header>

  <form method="POST" action="/admin/category/{{$category->id}}">
    @csrf
    @method('PUT')
    
    <div class="mb-6">
      <label for="name" class="inline-block text-lg mb-2">Category Name</label>
      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{$category->name}}" />

      @error('name')
      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
      @enderror
    </div>

    <div class="mb-6">
      <button class="bg-gray-700 text-white rounded p-3  hover:bg-black">
        Edit Category
      </button>

      <a href="/admin/products" class="text-black ml-4"> Back </a>
    </div>
  </form>
</div>
@endsection