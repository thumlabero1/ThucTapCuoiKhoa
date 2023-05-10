<?php

namespace App\Http\Services;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function getMenu()
    {
        $matchMenu = ['active' => 1, 'isDeleted' => false];
        return Menu::where($matchMenu)->get();
    }
    public function isValidProduct($request)
    {
        if (
            $request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }
        if (
            $request->input('price') == 0 && (int)$request->input('price_sale') != 0

        ) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }
    }
    public function create($request)
    {
        // $isValidPrice = $this->isValidProduct($request);
        // if ($isValidPrice == false) return false;
        try {
            $request->except('_token');
            Product::create([
                "name" => (string) $request->input('name'),
                "description" => (string) $request->input('description'),
                "content" => (string) $request->input('content'),
                "thumb" => (string) $request->input('thumb'),
                "menu_id" => (int) $request->input('menu_id'),
                "price" => (int) $request->input('price'),
                "price_sale" => (int) $request->input('price_sale'),
                "active" => (int) $request->input('active'),
                "slug" => Str::slug($request->input('name'), '-')
            ]);
            Session::flash('success', 'Thêm sản phẩm thành công');
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return false;
        }
        return true;
    }
    public function get()
    {
        $matchProduct = ['isDeleted' => false];
        try {
            return Product::where($matchProduct)->with('menu')->orderByDesc('id')->paginate(20);
        } catch (\Throwable $th) {
            Session::flash('error', 'Hiển thị thất bại! Vui lòng thử lại');
        }
    }
    public function destroy($request)
    {
        $id =  $request->input('id');
        try {
            $product = Product::where('id', $id)->first();
            if ($product) {
                Storage::delete($product->thumb);
                return Product::where('id', $id)->update(['isDeleted' => true]);
            }
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }
    public function update($product, $request)
    {
        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', "Cập nhật thành công sản phẩm");
        } catch (\Throwable $th) {
            Session::flash('success', "Cập nhật sản phẩm thất bại");
            return false;
        }
        return true;
    }
}
