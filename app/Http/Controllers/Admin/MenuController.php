<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Termwind\Components\Dd;
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
// thêm danh mục, trả về rout add
    return view('admin.menus.add',[
      'title' => 'Thêm danh mục mới',
      'menus'=>$this->menuService->getParent()
    ]);
 }
 public function store(CreateFormRequest $request)
 {
  //gọi hàm tạo trong menuservice với tham số là request
   $result = $this->menuService->create($request);
  //trả về đường dẫn hiện hành
   return redirect()->back();
 }

}
