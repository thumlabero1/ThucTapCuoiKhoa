<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Products\ProductsService;
use App\Http\Services\ProductType\ProductTypeService;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Termwind\Components\Dd;
use App\Models\Products;

class ProductsController extends Controller
{
    protected $EmployeesService;
    protected $ProductTypeService;

    public function __construct(ProductsService $ProductsService, ProductTypeService $ProductTypeService)
    {
      
      $this->ProductsService = $ProductsService;
      $this->ProductTypeService = $ProductTypeService;
    }
    public function index()
 {
  
  return view('admin.Products.list', [
    'title' =>'Danh sách Mặt Hàng',
     'Products' => $this->ProductsService->getAll()
  ]);
 }
 public function add()
 {
  return view('admin.Products.add',[
    'title' => 'Thêm sản phẩm mới',
    'ProductType' => $this->ProductTypeService->getAll()
  ]);
 }
 
}
