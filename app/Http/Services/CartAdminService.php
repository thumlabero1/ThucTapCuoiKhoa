<?php

namespace App\Http\Services;

use App\Jobs\SendMail;
use App\Models\CartDetails;
use App\Models\Carts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartAdminService
{
    public function getOrder()
    {
        return Carts::orderByDesc('id')->paginate(15);
    }
    public function getOrderDetail($cart)
    {
        return Carts::where('id', $cart->id)->orderByDesc('id')->with('user');
    }
    // public function destroy(){
    // }
}
