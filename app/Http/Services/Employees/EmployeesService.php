<?php

namespace App\Http\Services\Employees;
use App\Models\Employees;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;


class EmployeesService {
    
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
    
    public function updateMenu($id, $name, $description, $content)
    {
        $menu = Menu::findOrFail($id);
        $menu->name = $name;
        $menu->description = $description;
        $menu->content = $content;
        $menu->save();
    }
    public function getAll()
    {
        return Employees::orderbyDesc('id')->paginate(20);
    }
    
}