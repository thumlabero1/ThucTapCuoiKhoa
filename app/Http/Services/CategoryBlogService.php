<?php

namespace App\Http\Services;

use App\Models\CategoryBlog;
use Illuminate\Support\Str;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryBlogService
{
    public function create($request)
    {
        try {
            CategoryBlog::create([
                "name" => (string) $request->input('name'),
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
    public function show()
    {
        $matchThese = ['active' => 1, 'isDeleted' => false];
        return Menu::orderbyDesc('id')->where($matchThese)->skip(0)->take(3)->get();
    }
    public function getAll()
    {
        $matchThese = ['isDeleted' => false];
        return CategoryBlog::where($matchThese)->orderbyDesc('id')->paginate(20);
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
            $menu = CategoryBlog::where('id', $id)->first();
            if ($menu) {
                Storage::delete($menu->thumb);
                return CategoryBlog::where('id', $id)->update($mathUpdate);
            }
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }
    public function getProduct($menu, $request)
    {
        $query =  $menu->products()->where('active', 1);
        if ($request->input('price')) {
            $query->orderby('price', $request->input('price'));
        }
        return $query->orderbyDesc('id')->paginate(4)->withQueryString();
    }
}
