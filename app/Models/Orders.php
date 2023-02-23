<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ['card_holder', 'price', 'product_id', 'user_id', 'qty', 'card_number', 'card_expire', 'country', 'city', 'address', 'postal_code', 'cvv', 'email'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items() {
        return $this->belongsTo(Products::class, 'product_id');
    }
}