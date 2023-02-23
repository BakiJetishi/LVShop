@extends('dashboard.home')

@section('content')

<div>
    <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
          <div class="card">
            <div class="p-6">
              <div class="flex items-center justify-between">
                <div class=" text-lg">
                  <h3 class="font-bold">
                    Clients
                  </h3>
                  <h1>
                    {{$users}}
                  </h1>
                </div>
                <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="p-6">
              <div class="flex items-center justify-between">
                <div class=" text-lg">
                  <h3 class="font-bold">
                    Sales
                  </h3>
                  <h1>
                    {{$qty}}
                  </h1>
                </div>
                <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
              </div>
            </div>
          </div>
    
          <div class="card">
            <div class="p-6">
              <div class="flex items-center justify-between">
                <div class=" text-lg">
                  <h3 class="font-bold">
                    Profit
                  </h3>
                  <h1>
                    ${{$total}}
                  </h1>
                </div>
                <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
              </div>
            </div>
          </div>
        </div>
    
        <div class="card mb-6">
          <header class="card-header">
            <p class="flex items-center py-3 px-4 flex-grow font-bold">
              All Sales
            </p>
          </header>
          <div class="p-6 overflow-auto">
                    <table style="width:100%" class="border-2">
                        <tr class="border-2">
                            <th class="p-2 border-2">ID</th>
                            <th class="p-2 border-2">User ID</th>
                            <th class="p-2 border-2">Product ID</th>
                            <th class="p-2 border-2">Name</th>
                            <th class="p-2 border-2">Country</th>
                            <th class="p-2 border-2">City</th>
                            <th class="p-2 border-2">Address</th>
                            <th class="p-2 border-2">Postal Code</th>
                            <th class="p-2 border-2">Email</th>
                            <th class="p-2 border-2">Price</th>
                            <th class="p-2 border-2">Quantity</th>
                        </tr>
                    @foreach ($sales as $sale)
                        <tr class="border-2">
                            <td class="p-4 px-10 border-2">{{$sale->id}}</td>
                            <td class="p-4 px-10 border-2">{{$sale->user_id}}</td>
                            <td class="p-4 px-10 border-2">{{$sale->product_id}}</td>
                            <td class="p-4 px-10 border-2">{{$sale->card_holder}}</td>
                            <td class="p-4 px-10 border-2">{{$sale->country}}</td>
                            <td class="p-4 px-10 border-2">{{$sale->city}}</td>
                            <td class="p-4 px-10 border-2">{{$sale->address}}</td>
                            <td class="p-4 px-10 border-2">{{$sale->postal_code}}</td>
                            <td class="p-4 px-10 border-2">{{$sale->email}}</td>
                            <td class="p-4 px-10 border-2">{{$sale->price}}$</td>
                            <td class="p-4 px-10 border-2">{{$sale->qty}}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection