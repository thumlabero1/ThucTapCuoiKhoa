<?php

namespace App\Http\Controllers\homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\ProductType\ProductTypeService;
use App\Http\Services\Products\ProductsService;
class HomepageController extends Controller
{
    //
    protected $ProductTypeService;
    protected $ProductsService;
    public function __construct(ProductTypeService $ProductTypeService, ProductsService $ProductsService)
    {
      
      $this->ProductTypeService = $ProductTypeService;
      $this->ProductsService = $ProductsService;
    }
    public function index()
    {
        return view('homepage.Main', [
            'title' => 'Shop',
            'ProductType' => $this->ProductTypeService->getAll(),
            'Products' => $this->ProductsService->getAll()
        ]);
    }
}
