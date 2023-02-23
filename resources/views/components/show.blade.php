<x-layout>
<x-navbar />
<div class="mx-auto p-10 md:p-20 grid grid-cols-1 gap-24  justify-between">
    <div class="border rounded-lg p-5 shadow-md flex flex-col lg:flex-row gap-5">
        <img class="h-[500px] w-auto" src="{{$product->img ? asset('storage/' . $product->img) : asset('/images/no-image.png')}}"/>
        <div class="flex flex-col text-lg gap-2">
            <div class="text-[20px] md:text-[25px] lg:text-[40px]">{{$product->title}}</div>
            <div class="text-[12px] md:text-[18px] lg:mt-10">{{$product->description}}</div>
                <div><span class="text-[11px] md:text-[13px]">Price: </span> ${{$product->price}}</div>
                <form method="POST" action="/cart/product">
                    @csrf
                    <input type="hidden" name="title" value="{{$product->title}}"/>
                    <input type="hidden" name="price" value="{{$product->price}}"/>
                    <input type="hidden" name="product_id" value="{{$product->id}}"/>
                    <input type="hidden" name="img" value="{{$product->img}}"/>
                    <input type="hidden" name="qty" value="1"/>
                    <button class="p-3 rounded-md text-sm bg-orange-200 mt-5 flex" type="submit"><i class="fa-solid fa-cart-plus"></i></button>
                </form>
            </div>
    </div>
</div>
<x-footer/>
</x-layout>