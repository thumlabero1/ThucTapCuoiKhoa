<?php

namespace App\Http\Services;

use App\Models\Blog;
use App\Models\CategoryBlog;
use App\Models\Product;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlogService
{
    public function getMenu()
    {
        $matchMenu = ['active' => 1, 'isDeleted' => false];
        return CategoryBlog::where($matchMenu)->get();
    }
    public function create($request)
    {

        try {
            $request->except('_token');
            Blog::create([
                "name" => (string) $request->input('name'),
                "description" => (string) $request->input('description'),
                "content" => (string) $request->input('content'),
                "thumb" => (string) $request->input('thumb'),
                "category_blog_id" => (int) $request->input('category_blog_id'),
                "active" => (int) $request->input('active'),
                "slug" => Str::slug($request->input('name'), '-')
            ]);
            Session::flash('success', 'Thêm bài viết thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Thêm bài viết không thành công');
            return false;
        }
        return true;
    }
    public function get()
    {
        $matchProduct = ['active' => 1, 'isDeleted' => false];
        try {
            return Blog::where($matchProduct)->with('category')->orderByDesc('id')->paginate(20);
        } catch (\Throwable $th) {
            Session::flash('error', 'Hiển thị thất bại! Vui lòng thử lại');
        }
    }
    public function destroy($request)
    {
        $id =  $request->input('id');
        try {
            $product = Blog::where('id', $id)->first();
            if ($product) {
                Storage::delete($product->thumb);
                return Blog::where('id', $id)->update(['isDeleted' => true]);
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
