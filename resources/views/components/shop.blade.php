@props(['items'])

<div class="mx-auto max-w-7xl p-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-24 mb-5 justify-between mt-14">
    @foreach ($items as $item)
    <div class="border rounded-lg p-5 shadow-md flex justify-between flex-col">
        <a class="z-10" href="/products/{{$item->id}}"><div class="text-[20px] text-center">{{$item->title}}</div></a>
        <a href="/products/{{$item->id}}" ><img src="{{$item->img ? asset('storage/' . $item->img) : asset('/images/no-image.png')}}"/></a>
        <div class="flex justify-between text-lg items-end">
        <div>${{$item->price}}</div>
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