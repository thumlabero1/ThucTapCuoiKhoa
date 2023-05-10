<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\SliderRequest;
use App\Http\Services\SliderService;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderService;
    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }
    public function index()
    {
        return view('admin.slider.list', [
            "title" => "Danh sách slider",
            "sliders" => $this->sliderService->get()
        ]);
    }
    public function create()
    {
        return view('admin.slider.add', [
            "title" => "Thêm slider"
        ]);
    }
    public function store(SliderRequest $request)
    {
        $result = $this->sliderService->create($request);
        return  redirect()->back();
    }
    public function show(Slider $slider)
    {
        return view('admin.slider.edit', [
            "title" => "Chỉnh sửa slider: " . $slider->name,
            "slider" => $slider
        ]);
    }
    public function update(SliderRequest $request, Slider $slider)
    {
        $result = $this->sliderService->update($request, $slider);
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $result = $this->sliderService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                "message" => "Xóa thành công sản phẩm"
            ]);
        } else {
            return response()->json([
                'error' => true,
                "message" => "Xóa sản phẩm thất bại"
            ]);
        }
    }
}
