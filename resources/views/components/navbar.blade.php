<div class="bg-gray-100 px-6 p-6">
  <nav class="sm:px-16 px-4  flex items-center justify-between">
      <a href="/">
        <h2 class="font-bold text-2xl text-orange-300">LVshop</h2>
      </a>
    
    <div class="hidden sm:block">
      @include('partials._search')
    </div>
    
    <div class="hidden lg:flex">
        <a href="/cart" class="mr-5 font-bold text-gray-900  hover:bg-gray-300 p-3 rounded-md"><i class="fa-solid fa-cart-shopping"></i> Cart</a>
      @auth
        <div class="mt-3">
          @if (auth()->user()->role == 1)
          <a href="/admin/dashboard" class="font-semibold leading-6 text-gray-900  hover:bg-gray-300 p-3 rounded-md">Dashboard</a>
          @else
          <a href="/account" class="font-semibold leading-6 text-gray-900  hover:bg-gray-300 p-3 rounded-md">Account Settings</a>
          @endif
          <a href="/logout" class=" font-semibold leading-6 text-gray-900  hover:bg-gray-300 p-3 rounded-md">Logout</a>
        </div>
      @else
        <div class="mt-3">
          <a href="/login" class=" font-semibold leading-6 text-gray-900  hover:bg-gray-300 p-3 rounded-md">Login</a>
          <a href="/register" class=" font-semibold leading-6 text-gray-900  hover:bg-gray-300 p-3 rounded-md">Register</a>
        </div>
      @endauth
    </div>

    <div class="flex lg:hidden">
      <button type="button" class="z-50 show-menu -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
        <span class="sr-only">Open main menu</span>
        <!-- Heroicon name: outline/bars-3 -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </div>

  </nav>
  <!-- Mobile menu, show/hide based on menu open state. -->
  <div role="dialog" aria-modal="true" id="mobile-menu" class="hidden">
    <div focus="true" class="fixed top-0 bottom-0 inset-0 z-40 bg-white px-8 py-8 lg:hidden">
      <a href="/">
        <h2 class="font-bold text-2xl text-orange-300">LVshop</h2>
      </a>
      <div class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-gray-500/10">
          <div class="space-y-2 py-6">
            <a href="/" class="-mx-3 block rounded-lg py-2 px-5 font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">Home</a>
            <a href="/products" class="-mx-3 block rounded-lg py-2 px-5 font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">Shop</a>
            <a href="#" class="-mx-3 block rounded-lg py-2 px-5 font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">About US</a>
            <a href="/contactus" class="-mx-3 block rounded-lg py-2 px-5 font-semibold leading-7 text-gray-900 hover:bg-gray-400/10">Contact US</a>
          </div>
          @auth
          <div class="py-6">
            @if(auth()->user()->role== 1)
            <a href="/admin/dashboard" class="-mx-3 block rounded-lg py-2.5 px-5 font-semibold leading-6 text-gray-900 hover:bg-gray-400/10">Dashboard</a>
            @else
            <a href="/account" class="-mx-3 block rounded-lg py-2.5 px-5 font-semibold leading-6 text-gray-900 hover:bg-gray-400/10">Account Settings</a>
            @endif
            <a href="/logout" class="-mx-3 block rounded-lg py-2.5 px-5 font-semibold leading-6 text-gray-900 hover:bg-gray-400/10">Logout</a>
          </div>
          @else
          <div class="py-6">
            <a href="/login" class="-mx-3 block rounded-lg py-2.5 px-5 font-semibold leading-6 text-gray-900 hover:bg-gray-400/10">Login</a>
            <a href="/register" class="-mx-3 block rounded-lg py-2.5 px-5 font-semibold leading-6 text-gray-900 hover:bg-gray-400/10">Register</a>
          </div>
          @endauth
          @include('partials._search')
        </div>
      </div>
    </div>
  </div>
  
</div>
<div class="bg-gray-200 hidden lg:flex lg:gap-x-8 px-20 py-1">
  <a href="/" class=" font-semibold leading-6 hover:bg-gray-300 p-3 rounded-md text-gray-900">Home</a>
  <a href="/products" class=" font-semibold leading-6 hover:bg-gray-300 p-3 rounded-md text-gray-900">Shop</a>
  <a href="#" class=" font-semibold leading-6 hover:bg-gray-300 p-3 rounded-md text-gray-900">About US</a>
  <a href="/contact" class=" font-semibold leading-6 hover:bg-gray-300 p-3 rounded-md text-gray-900">Contact US</a>
</div>