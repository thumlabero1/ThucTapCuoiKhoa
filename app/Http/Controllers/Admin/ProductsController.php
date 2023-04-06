<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Products\ProductsService;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Termwind\Components\Dd;
use App\Models\Products;

class ProductsController extends Controller
{
    protected $EmployeesService;

    public function __construct(ProductsService $ProductsService)
    {
      
      $this->ProductsService = $ProductsService;
    }
    public function index()
 {
  # code...pEmployeesService
  return view('admin.Products.list', [
    'title' =>'Danh sách Mặt Hàng',
     'Products' => $this->ProductsService->getAll()
  ]);
 }
}
