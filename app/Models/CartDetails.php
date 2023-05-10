<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class CartDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id',
        'product_id',
        'qty',
        'price',
        'created_at',
    ];
    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
