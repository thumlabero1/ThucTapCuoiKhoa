<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Carts;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password',
        'phone', 'address'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function carts()
    {
        return $this->hasMany(Cart::class, 'customer_id', 'id');
    }
}
