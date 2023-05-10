<?php

namespace App\Http\Controllers;

use App\Http\Services\MenuService;
use Illuminate\Http\Request;

class MenuClientController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function index(Request $request, $id, $slug)
    {

        $menu = $this->menuService->getIds($id);
        $products = $this->menuService->getProduct($menu, $request);
        return view('client.product.menu_list', [
            "title" => $menu->name,
            "products" => $products,
            "menu" => $menu
        ]);
    }
}
