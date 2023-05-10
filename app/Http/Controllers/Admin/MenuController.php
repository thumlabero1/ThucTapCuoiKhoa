<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\MenuService;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function index()
    {
        return view('admin.menu.list', [
            "title" => "Danh sách danh mục mới nhất",
            "menus" => $this->menuService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.menu.add', [
            "title" => "Thêm danh mục mới",
            "menus" => $this->menuService->getParent()
        ]);
    }
    public function store(CreateFormRequest $request)
    {
        $result = $this->menuService->create($request);
        return  redirect()->back();
    }

    public function show(Menu $menu)
    {
        return view('admin.menu.edit', [
            "title" => "Chỉnh sửa danh mục: " . $menu->name,
            "menus" => $this->menuService->getParent(),
            "menu" => $menu
        ]);
    }
    public function update(Menu $menu, CreateFormRequest $request)
    {
        $this->menuService->update($menu, $request);

        return redirect('/admin/menus/list');
    }
    public function destroy(Request $request)
    {

        $result = $this->menuService->destroy($request);
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
