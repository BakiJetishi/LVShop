@extends('dashboard.home')

@section('content')
<div class="bg-gray-50 p-5 md:w-1/4">
    @foreach ($categories as $category)
        <div class="flex items-center justify-between gap-5 p-5 border">
        <p>{{$category->name}}</p>
        <div class="flex items-center gap-5">
        <a href="/admin/category/{{$category->id}}/edit" class="rounded-md  py-2 px-4 bg-red-700">Edit</a>
        <form method="POST" action="/admin/categories/{{$category->id}}" class="mt-4">
            @csrf
            @method('DELETE')
            <a href="/admin/category/{{$category->id}}/delete" class="rounded-md py-2 px-4 bg-red-700">Delete</a>
          </form>
        </div>
        </div>
        @endforeach
</div>
@endsection