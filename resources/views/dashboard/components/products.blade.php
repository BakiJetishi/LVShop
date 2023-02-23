@extends('dashboard.home')

@section('content')
<div class="mx-auto max-w-7xl p-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-24 mb-5 justify-between mt-14">
    @foreach ($products as $item)
    <div class="bg-white border rounded-lg p-5 shadow-md flex justify-between flex-col">
        <div class="text-[20px] text-center">{{$item->title}}</div>
        <img src="{{$item->img ? asset('storage/' . $item->img) : asset('/images/no-image.png')}}"/>
        <div class="flex justify-between text-lg items-end mx-3 mt-6">
            <form>
            <a href="/admin/products/{{$item->id}}/edit" class="rounded-md py-2 px-4 bg-orange-200">Edit</a>
            </form>
            <form method="POST" action="/admin/product/{{$item->id}}">
                @csrf
                @method('DELETE')
                <a href="/admin/product/{{$item->id}}/delete" class="rounded-md  py-2 px-4 bg-red-700">Delete</a>
              </form>
        </div>
    </div>
    @endforeach
</div>
@endsection