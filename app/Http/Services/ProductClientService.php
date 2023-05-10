<?php

namespace App\Http\Services;

use App\Models\Product;

class ProductClientService
{
    const LIMIT = 4;
    public function get($page = null)
    {

        $matchProduct = ['active' => 1, "isDeleted" => false];
        return Product::where($matchProduct)->select('id', 'name', 'price', 'price_sale', 'thumb')
            ->orderbyDesc('id')
            ->when($page != null, function ($query) use ($page) {

                $query->offset($page * self::LIMIT);
            })

            ->limit(self::LIMIT)
            ->get();
    }
    public function getSlideProductClient()
    {

        $matchProduct = ['active' => 1, "isDeleted" => false];
        return Product::where($matchProduct)->select('id', 'name', 'price', 'price_sale', 'thumb')
            ->orderbyDesc('id')
            ->limit(8)
            ->get();
    }
    public function show($id)
    {
        return Product::where('id', $id)->where('active', 1)->with('menu')->firstOrFail();
    }
    public function related($id)
    {
       
         $product = Product::where('id', $id)->where('active', 1)->with('menu')->firstOrFail();
        return Product::where('menu_id', $product->menu_id)->where('active', 1)->with('menu')
        ->where('id', '!=', $id)->limit(4)->get();
    }
    public function getSearch($params = null, $request)
    {

        $matchProduct = ['active' => 1, "isDeleted" => false];

        $query = Product::where($matchProduct)->where('name', 'like', "%$params%");
        if ($request->input('price')) {
            $query->orderby('price', $request->input('price'));
        }
        return $query->select('id', 'name', 'price', 'price_sale', 'thumb')
            ->orderbyDesc('id')
            ->get();
    }
}
