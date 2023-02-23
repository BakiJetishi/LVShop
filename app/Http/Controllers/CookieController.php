<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function setCookie(Request $request) {
        $oldData = json_decode(Cookie::get('cart'), true) ?? [];

        $newData = [$request->product_id => $request->validate([
            'title' => 'required',
            'price' => 'required',
            'product_id' => 'required',
            'img' => 'required',
            'qty' => 'required'
        ])];

        if (isset($oldData[$request->product_id])) {
            $newData[$request->product_id]['qty'] = $oldData[$request->product_id]['qty'] + 1;
        }
        
        $data = $newData+$oldData;

        $total = null;

        foreach ($data as $item) {
            $subtotal = floatval($item['qty']) * floatval($item['price']);
            $total += $subtotal;
        };

        $subtotal = $total;
        
        Cookie::queue('cart', json_encode($data), 10000);
        Cookie::queue('subtotal', json_encode($subtotal), 10000);

        return redirect('/cart');
    }

    public function getCookie(Request $request) {
        $data = json_decode(request()->cookie('cart'), true);

        print_r($data);
    }

    public function removeCookie(Request $request, Response $response)
    {
        // Get the item index from the request
        $id = $request->input('id');

        // Get the items from the cookie
        $items = json_decode($request->cookie('cart'), true);
        $subtotal = json_decode($request->cookie('subtotal'), true);
        
        $subtotal -= floatval($items[$id]['qty']) * floatval($items[$id]['price']);

        if (isset($items[$id])) {
            unset($items[$id]);
        }

        Cookie::queue('cart', json_encode($items), 10000);
        Cookie::queue('subtotal', json_encode($subtotal), 10000);

        return redirect()->back();
    }
}