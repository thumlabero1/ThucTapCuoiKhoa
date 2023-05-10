<?php

namespace App\Http\Services;

use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MenuService
{
    public function createProduct($request)
    {
        try {

            Product::create([
                "name" => (string) $request->input('name'),
                "description" => (string) $request->input('description'),
                "content" => (string) $request->input('content'),
                "thumb" => (string) $request->input('thumb'),
                "menu_id" => (int) $request->input('menu_id'),
                "price" => (int) $request->input('price'),
                "price_sale" => (int) $request->input('price_sale'),
                "active" => (int) $request->input('active'),
            ]);
            Session::flash('success', 'Thêm sản phẩm thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Thêm sản phẩm thất bại');
            return false;
        }
        return true;
    }
    public function create($request)
    {
        try {
            Menu::create([
                "name" => (string) $request->input('name'),
                "parent_id" => (int) $request->input('parent_id'),
                "description" => (string) $request->input('description'),
                "content" => (string) $request->input('content'),
                "active" => (int) $request->input('active'),
                "thumb" => (string) $request->input('thumb'),
                "slug" => Str::slug($request->input('name'), '-')
            ]);
            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Tạo danh mục thất bại! Vui lòng thử lại');
            return false;
        }
        return true;
    }
    public function getIds($id)
    {
        $matchThese = ['id' => $id, 'isDeleted' => false];
        return Menu::where($matchThese)->firstOrFail();
    }
    public function getParent()
    {
        $matchThese = ['parent_id' => 0, 'active' => 1, 'isDeleted' => false];
        try {
            return Menu::where($matchThese)->get();
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
            return false;
        }
    }
    public function show()
    {
        $matchThese = ['parent_id' => 0, 'active' => 1, 'isDeleted' => false];
        return Menu::orderbyDesc('id')->where($matchThese)->skip(0)->take(3)->get();
    }
    public function getAll()
    {
        $matchThese = ['isDeleted' => false];
        return Menu::where($matchThese)->orderbyDesc('id')->paginate(20);
    }
    public function update($menu, $request): bool
    {
        // không cập nhật slug
        $menu->fill($request->input());
        $menu->save();
        Session::flash('success', "Cập nhật thành công danh mục");
        return true;
    }
    public function destroy($request)
    {
        $id =  (int)$request->input('id');
        $mathUpdate = ["isDeleted" => true, 'active' => 0];
        try {
            $menu = Menu::where('id', $id)->first();
            if ($menu) {
                Storage::delete($menu->thumb);
                Product::where('menu_id', $id)->update(['isDeleted', true]);
                return Menu::where('id', $id)->orWhere('parent_id', $id)->update($mathUpdate);
            }
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }
    public function getProduct($menu, $request)
    {
        $query =  $menu->products()->where(['active'=> 1, "isDeleted" => false]);
        if ($request->input('price')) {
            $query->orderby('price', $request->input('price'));
        }
        return $query->orderbyDesc('id')->paginate(4)->withQueryString();
    }
}
