<?php

namespace App\Http\Services;

use App\Jobs\SendMail;
use App\Models\CartDetails;
use App\Models\Carts;
use App\Models\Customers;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('num-product');
        $product_id = (int)$request->input('product_id');
        // if < 0 session khong chinh xac return false
        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }
        $carts[$product_id] = $qty;
        Session::put(
            'carts',
            $carts
        );
        return true;
    }
    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];
        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
    }
    public function update($request)
    {
        Session::put('carts', $request->input('num-product'));
        return true;
    }
    public function destroy($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);

        return true;
    }
    public function addCart()
    {
        try {
            DB::beginTransaction();
            $carts = Session::get('carts');
            if (is_null($carts)) {
                return false;
            }

            $cartAdded = Carts::create([
                "customer_id" => Auth::user()->id,
                "status" => 0,
            ]);
            $this->inforProduct($carts, $cartAdded->id);
            DB::commit();
            Session::flash('success', 'Đặt hàng thành công');
            Session::forget('carts');
            SendMail::dispatch(Auth::user()->email)->delay(now()->addSeconds(5));
        } catch (\Throwable $th) {
            DB::rollBack();
            Session::flash('error', $th->getMessage());
            return false;
        }
        return true;
    }
    public function inforProduct($carts, $cartAdded)
    {
        $productId = array_keys($carts);
        $products =  Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();


        foreach ($products as $key => $product) {
            $data = [
                'cart_id' => $cartAdded,
                'product_id' => $product->id,
                'qty' => $carts[$product->id],
                'price' => $product->price_sale != 0 ? $product->price_sale  : $product->price,
            ];
            CartDetails::create($data);
        }
    }
}
