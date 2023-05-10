<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductClientService;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductClientController extends Controller
{
    protected $productService;
    public function __construct(ProductClientService  $productService)
    {
        $this->productService = $productService;
    }
    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productRelated = $this->productService->related($id);
        return view('client.product.product_details', [
            "title" => "Chi tiết sản phẩm",
            "productRelated" => $productRelated,
            "product" => $product
        ]);
    }
}
