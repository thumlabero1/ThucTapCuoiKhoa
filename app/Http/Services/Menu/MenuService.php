<?php

namespace App\Http\Services\Menu;
use App\Models\menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class MenuService {
    public function create($request)
    {
        # code...
        try {
            //code...
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
                'slug' => Str::slug($request->input('name'), '-')
            ]);
            Session::flash('success', 'Thêm mới dữ liệu thành công!');
        } catch (\Exception $err) {
            //throw $th;
            session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
}