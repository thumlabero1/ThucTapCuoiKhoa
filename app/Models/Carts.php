<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CartDetails;

class Carts extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'customer_id',
        'status',
        'created_at',
    ];
    public function details()
    {
        return $this->hasMany(CartDetails::class, 'cart_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'customer_id');
    }
}
