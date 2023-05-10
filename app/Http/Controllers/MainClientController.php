<?php

namespace App\Http\Controllers;


use App\Http\Services\BlogClientService;
use App\Http\Services\MenuService;
use App\Http\Services\ProductClientService;
use App\Http\Services\SliderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainClientController extends Controller
{
    protected $sliderService;
    protected $menuService;
    protected $productServie;
    protected $blogService;
    public function __construct(BlogClientService $blogService, SliderService $sliderService, MenuService $menuService, ProductClientService $productServie)
    {
        $this->sliderService = $sliderService;
        $this->menuService = $menuService;
        $this->productServie = $productServie;
        $this->blogService = $blogService;
    }
    public function index()
    {
        return view('client.home', [
            "title" => "Shop",
            "sliders" => $this->sliderService->show(),
            "menus" => $this->menuService->show(),
            "products" => $this->productServie->getSlideProductClient(),
            "blogs" => $this->blogService->getMainBlogClient()
        ]);
    }
    public function loadProduct(Request $request)
    {
        $page = $request->input('page');

        $result = $this->productServie->get($page);
        if (count($result) != 0) {
            $html = view('client.product.list', ['products' => $result])->render();
            return response()->json([
                'html' => $html
            ]);
        }
        return response()->json([
            'html' => ''
        ]);
    }
    public function search(Request $request)
    {
        $result = [];
        Session::forget('error');
        try {
            $param = $_GET['q'];
            $result = $this->productServie->getSearch($param, $request);
            if ($result && count($result) == 0) {
                Session::flash('error', "Sản phẩm không tồn tại");
            }
        } catch (\Throwable $th) {
            Session::flash('error', $th->getMessage());
        }

        return view('client.search', ["title" => "Kết quả tìm kiếm", 'products' => $result])->render();
    }
    public function about_us()
    {
        return view('client.about_us', ["title" => "Về chúng tôi"]);
    }
}
