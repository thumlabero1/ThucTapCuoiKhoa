<?php

namespace App\Http\Services\ProductType;
use App\Models\ProductType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class ProductTypeService {
    
    public function getid($id)
    {
       return Menu::where('id',$id)->get();
    }
    public function getAll()
    {
        return ProductType::get();
    }
    
}