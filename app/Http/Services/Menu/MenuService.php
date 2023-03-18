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
            ]);
            Session::flash('success', 'Thêm mới dữ liệu thành công!');
        } catch (\Exception $err) {
            //throw $th;
            session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function getParent()
    {
        # code...
        return Menu::where('parent_id', 0)->get();
    }
}