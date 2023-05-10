<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use App\Http\Services\BlogService;
use App\Http\Services\CategoryBlogService;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;
    protected $categoryblogService;
    public function __construct(BlogService $blogService, CategoryBlogService $categoryblogService)
    {
        $this->blogService = $blogService;
        $this->categoryblogService = $categoryblogService;
    }
    public function index()
    {

        return view('admin.blog.list', [
            "title" => "Danh sách sản phẩm",
            "blogs" => $this->blogService->get()
        ]);
    }


    public function create()
    {
        return view('admin.blog.add', [
            "title" => "Thêm sản phẩm",
            "menus" => $this->blogService->getMenu()
        ]);
    }


    public function store(BlogRequest $request)
    {


        $this->blogService->create($request);
        return redirect()->back();
    }


    public function show(Blog $blog)
    {
        return view('admin.blog.edit', [
            "title" => "Chỉnh sửa sản phẩm: " . $blog->name,
            "menus" => $this->blogService->getMenu(),
            "blog" => $blog
        ]);
    }

    public function update(Blog $blog, BlogRequest $request)
    {
        $res = $this->blogService->update($blog, $request);
        if ($res) {
            return redirect('/admin/blogs/list');
        }

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->blogService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                "message" => "Xóa thành công bài viết"
            ]);
        } else {
            return response()->json([
                'error' => true,
                "message" => "Xóa bài viết thất bại"
            ]);
        }
    }
}
