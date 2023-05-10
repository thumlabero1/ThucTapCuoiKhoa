<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryBlog\CategoryBlogRequest;
use App\Http\Services\CategoryBlogService;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;

class CategoryBlogController extends Controller
{
    protected $categoryBlogService;
    public function __construct(CategoryBlogService $categoryBlogService)
    {
        $this->categoryBlogService = $categoryBlogService;
    }
    public function index()
    {
        return view('admin.categoryblog.list', [
            "title" => "Danh sách danh mục mới nhất",
            "menus" => $this->categoryBlogService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.categoryblog.add', [
            "title" => "Thêm danh mục bài viết"
        ]);
    }
    public function store(CategoryBlogRequest $request)
    {
        $result = $this->categoryBlogService->create($request);
        return  redirect()->back();
    }

    public function show(CategoryBlog $menu)
    {
        return view('admin.categoryblog.edit', [
            "title" => "Chỉnh sửa danh mục: " . $menu->name,
            "menu" => $menu
        ]);
    }
    public function update(CategoryBlog $menu, CategoryBlogRequest $request)
    {
        $this->categoryBlogService->update($menu, $request);

        return redirect('/admin/category-blog/list');
    }
    public function destroy(Request $request)
    {

        $result = $this->categoryBlogService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                "message" => "Xóa thành công danh mục"
            ]);
        } else {
            return response()->json([
                'error' => true,
                "message" => "Xóa danh mục thất bại"
            ]);
        }
    }
}
