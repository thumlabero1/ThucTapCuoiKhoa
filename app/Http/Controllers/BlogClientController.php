<?php

namespace App\Http\Controllers;

use App\Http\Services\BlogClientService;

class BlogClientController extends Controller
{
    protected $blogService;
    public function __construct(BlogClientService $blogService)
    {
        $this->blogService = $blogService;
    }
    public function index()
    {
        $blogs = $this->blogService->getMainBlogClient();
        // $productRelated = $this->blogService->related($id);
        return view('client.blog.list', [
            "title" => "Bài viết",
            "blogs" => $blogs
        ]);
    }
    public function show($id = '', $slug = '')
    {
        $blog = $this->blogService->show($id);
        // $productRelated = $this->blogService->related($id);
        return view('client.blog.blog_details', [
            "title" => "Chi tiết bài viết",
            "blog" => $blog
        ]);
    }
}
