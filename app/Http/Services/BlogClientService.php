<?php

namespace App\Http\Services;

use App\Models\Blog;

class BlogClientService
{
    const LIMIT = 3;
    public function get($page = null)
    {

        $matchProduct = ['active' => 1, "isDeleted" => false];
        return Blog::where($matchProduct)
            ->orderbyDesc('id')
            ->when($page != null, function ($query) use ($page) {

                $query->offset($page * self::LIMIT);
            })

            ->limit(self::LIMIT)
            ->get();
    }
    public function getMainBlogClient()
    {

        $matchProduct = ['active' => 1, "isDeleted" => false];
        return Blog::where($matchProduct)->select('id', 'name', 'description', 'content', 'thumb', 'slug')
            ->orderbyDesc('id')
            ->paginate(3);
    }
    public function show($id)
    {
        return Blog::where('id', $id)->where('active', 1)->with('category')->firstOrFail();
    }
    public function related($id)
    {
        return Blog::where('id', $id)->where('active', 1)->with('menu')->firstOrFail()
            ->where('id', '!=', $id)->limit(8)->get();
    }
}
