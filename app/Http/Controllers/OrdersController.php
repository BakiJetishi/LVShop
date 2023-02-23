<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrdersController extends Controller
{
    public function store(Request $request) {
        $formFields = $request->validate([
            'card_holder' => ['required', 'min:5'],
            'card_number' => ['required', 'min:14'],
            'card_expire' => ['required', 'min:4'],
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'cvv' => ['required', 'min:3'],
            'email' => ['required', 'email'],
        ]);

        $formFields['user_id'] = auth()->id();
        
        $cart = json_decode(Cookie::get('cart'), true) ?? [];

        foreach ($cart as $data => $value) {
            $formFields['product_id'] = $value['product_id'];
            $formFields['qty'] = $value['qty'];
            $formFields['price'] = $value['price'];

            Orders::create($formFields);
        }

        $cartData = json_decode($_COOKIE['cart'], true);

        $subtotal = 0;
        
        unset($cartData[$request->product_id]);

        setcookie('cart', json_encode($cartData), time() + 3600, '/');
        setcookie('subtotal', json_encode($subtotal), time() + 3600, '/');

        return redirect('/')->with('success', 'Order has been completed successfully!');
    }
}