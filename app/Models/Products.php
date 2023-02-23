<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'img', 'price', 'user_id', 'category_id', 'description'];

    public function scopeFilter($query, array $filters) {

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories() {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function orders() {
        return $this->hasMany(Orders::class, 'product_id');
    }
}