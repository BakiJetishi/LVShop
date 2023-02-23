<x-layout>
    <x-navbar />
    <div class="z-10 max-w-2xl mx-auto mt-10">
        <div class=" overflow-y-auto px-5">
            <h2 class=" p-2 text-center text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>

                    <ul class="divide-gray-200 border-t">
                        @unless (count($items) == 0)
                            
                        @foreach ($items as $item => $value)
                        <li class="flex py-6 border p-3 m-2">
                            <div class="overflow-hidden rounded-md border border-gray-200">
                                <img src="storage/{{$value['img']}}" alt="" class=" w-32 h-32">
                            </div>

                            <div class="ml-4 flex flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                            <a href="#">{{$value['title']}}</a>
                                        </h3>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">${{$value['price']}}</p>
                                </div>
                                <div class="flex mt-2 items-end justify-between text-sm">
                                    <p class="text-gray-500">Qty {{$value['qty']}}</p>
                                </div>
                                <div class="flex mt-6">
                                    <form action="/cart/remove">
                                        <input type="hidden" name="id" value="{{$value['product_id']}}" />
                                        <button type="submit" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @else 
                        <p class="py-5 font-bold">No items in cart</p>
                        @endunless

                    </ul>
        </div>

        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
            <div class="flex justify-between text-base font-medium text-gray-900">
                <p>Subtotal</p>
                <p>${{$subtotal}}</p>
            </div>
            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
            <div class="mt-6">
                @auth
                <a href="/cart/checkout" class="{{count($items) == 0 ? 'pointer-events-none bg-gray-300' : ' bg-indigo-600 hover:bg-indigo-700'}} flex items-center justify-center rounded-md border border-transparent  px-6 py-3 text-base font-medium text-white shadow-sm">Checkout</a>
                @else
                <a href="#" class="pointer-events-none bg-gray-300 flex items-center justify-center rounded-md border border-transparent  px-6 py-3 text-base font-medium text-white shadow-sm">Login to Checkout</a>
                @endauth
            </div>
            <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                <p>
                    or
                    <a href="{{ URL::previous() }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Continue Shopping
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </p>
            </div>
        </div>
    </div>


    <x-footer />
</x-layout>