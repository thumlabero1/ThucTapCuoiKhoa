<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Termwind\Components\Dd;
use App\Http\Service\MenuService;
/**
 * Summary of MenuController
 */
class MenuController extends Controller
{
    //
    protected $menuService;
    
    public function __construct(MenuService $menuService)
    {
      
      $this->menuService = $menuService;
    }
 public function create(){

    return view('admin.menus.add',[
      'title' => 'Thêm danh mục mới',
    ]);
 }
 public function store(CreateFormRequest $request)
 {
   $result = $this->menuService->create($request);
 }

}
