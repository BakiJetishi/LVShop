@extends('dashboard.home')

@section('content')

@props(['categories'])

    <div class="bg-gray-50 border border-gray-200 rounded p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Post a product</h2>
      </header>
  
      <form method="POST" action="/admin/products" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label for="title" class="inline-block text-lg mb-2">Title</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" />
  
          @error('title')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="img" class="inline-block text-lg mb-2">
            Product image
          </label>
          <input type="file" class="border border-gray-200 rounded p-2 w-full" name="img" />
  
          @error('img')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="price" class="inline-block text-lg mb-2">
            Product price
          </label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price"  />
  
          @error('price')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="description" class="inline-block text-lg mb-2">
            Description
          </label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="description"  />
  
          @error('description')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <label class="block" for="category_id" >Choose category:</label>
        <select name="category_id" class="p-3 px-1 mb-6" id="category_id">
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>

        <div class="mb-6">
          <button class="bg-gray-700 text-white rounded p-3  hover:bg-black">
            Create Item
          </button>
  
          <a href="/" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </div>
@endsection  