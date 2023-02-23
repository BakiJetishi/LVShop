<x-layout>
<x-navbar/>

<div class="2xl:absolute 2xl:left-52 2xl:-bottom-80 2xl:h-full 2xl:my-10 flex w-10/12 mx-auto mt-10 flex-col 2xl:w-auto">
    <p class="p-2 lg:p-5 2xl:border-x">Select Category:</p>
    <form action="/products" id="categories" class="flex flex-col">
    @csrf
    @foreach ($categories as $category)
    <div class="p-2 lg:p-5 border">
        <input type="checkbox" id="{{$category->id}}" data-id="{{$category->id}}" name="{{$category->id}}"/>
        <label for="{{$category->id}}">{{$category->name}}</label>
    </div>
        @endforeach
    </form>
</div>

<div id="products" class="mx-auto max-w-7xl p-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-24 mb-5 justify-between 2xl:mt-14 relative">
    @foreach ($products as $item)
    <div class="bg-white border rounded-lg p-5 shadow-md flex justify-between flex-col">
        <a href="/products/{{$item->id}}" ><div class="text-[20px] text-center">{{$item->title}}</div></a>
        <a href="/products/{{$item->id}}" ><img src="{{$item->img ? asset('storage/' . $item->img) : asset('/images/no-image.png')}}"/></a>
        <div class="flex justify-between text-lg items-end mx-3 mt-6">
            <p>Price: <span class="text-2xl text-red-500">${{$item->price}}</span></p>
            <form method="POST" action="/cart/product">
                @csrf
                <input type="hidden" name="title" value="{{$item->title}}"/>
                <input type="hidden" name="price" value="{{$item->price}}"/>
                <input type="hidden" name="product_id" value="{{$item->id}}"/>
                <input type="hidden" name="img" value="{{$item->img}}"/>
                <input type="hidden" name="qty" value="1"/>
                <button class="p-3 rounded-md text-sm bg-orange-200 mt-5 flex" type="submit"><i class="fa-solid fa-cart-plus"></i></button>
            </form>
        </div>
    </div>
    @endforeach
</div>
<div class="mx-auto max-w-7xl px-10 grid ">
    {{$products->links()}}
  </div>
<x-footer/>
</x-layout>