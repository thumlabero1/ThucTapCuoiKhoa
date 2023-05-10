<?php

namespace App\Http\Services;

use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function create($request)
    {
        try {
            $request->except('_token');
            Slider::create($request->all());
            Session::flash('success', 'Thêm slider thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Thêm slider thất bại');
            return false;
        }
        return true;
    }
    public function get()
    {
        return Slider::orderby('sort_by')->paginate(15);
    }
    public function show()
    {
        return Slider::where('active', 1)->orderby('sort_by')->paginate(15);
    }
    public function update($request, $slider)
    {
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Cập nhật slider thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Thêm slider thất bại');
            return false;
        }
        return true;
    }
    public function destroy($request)
    {
        $slider = Slider::where('id', (int)$request->input('id'))->first();
        if ($slider) {
            $path = str_replace('storge', 'public', $slider->thumb);
            Storage::delete($path);
            $slider->delete();
            return true;
        }
        return false;
    }
}
