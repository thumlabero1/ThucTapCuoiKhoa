<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService  $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index(Request $request)
    {
        $res = $this->cartService->create($request);
        if ($res == false) {
            return redirect()->back();
        }
        return redirect('/carts');
    }
    public function show()
    {
        $products = $this->cartService->getProduct();
        return view('client.cart.list', [
            "title" => 'Danh sách đơn hàng',
            "products" => $products,
            "carts" => Session::get('carts')
        ]);
    }
    public function update(Request $request)
    {
        $this->cartService->update($request);
        return redirect('/carts');
    }
    public function destroy($id = 0)
    {
        $res = $this->cartService->destroy($id);
        if ($res == true) {
            return redirect('/carts');
        }
        return redirect()->back();
    }
    public function addCart(Request $request)
    {
        $res = $this->cartService->addCart($request);
        return redirect()->back();
    }
}
