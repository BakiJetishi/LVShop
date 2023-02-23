@extends('dashboard.home')

@section('content')

@props(['categories'])

    <div class="bg-gray-50 border border-gray-200 rounded p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Post a product</h2>
      </header>
  
      <form method="POST" action="/admin/category">
        @csrf
        <div class="mb-6">
          <label for="name" class="inline-block text-lg mb-2">Category Name</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" />
  
          @error('title')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-6">
          <button class="bg-gray-700 text-white rounded p-3  hover:bg-black">
            Create Category
          </button>
  
          <a href="/" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </div>
@endsection  