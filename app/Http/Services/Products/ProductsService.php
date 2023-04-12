<?php

namespace App\Http\Services\Products;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductsService {
    
    public function getid($id)
    {
       return Menu::where('id',$id)->get();
    }
    public function destroy($request)
    {
        $id = (int) $request->input(id);

        $menu = Menu::where('id',$request->input('id'))->first();
        if($menu) {
            return Menu::where('id', $id)->orWhere('parent_id',$id)->delete();
    }
        return false;
    }
    
    public function create($request)
{
    try {
        // Lưu ảnh và lấy đường dẫn
        $image_path = $request->file('image')->store('public/images');

        // Lưu sản phẩm vào cơ sở dữ liệu
        Products::create([
            'ProductName' => $request->input('productName'),
            'ProductType' => $request->input('productType'),
            'Description' => $request->input('description'),
            'Price' => $request->input('price'),
            'Inventory' => $request->input('inventory'),
            'Manufacturer' => $request->input('manufacturer'),
            'image' => $image_path,
        ]);

        Session::flash('success', 'Thêm mới dữ liệu thành công!');
    } catch (\Exception $err) {
        session::flash('error', $err->getMessage());
        return false;
    }
    return true;
}

    public function getAll()
    {
        return Products::get();
    }
}