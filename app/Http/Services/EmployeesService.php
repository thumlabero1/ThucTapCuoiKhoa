<?php

namespace App\Http\Services;

use App\Models\employees;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class EmployeesService
{
    public function create($request)
    {
        try {
            $request->except('_token');
            employees::create(
                [
                    "name" =>  $request->input('name'),
                    "address" =>  $request->input('address'),
                    "phone" => $request->input('phone'),
                    "position" => $request->input('position'),
                ]
            );
            Session::flash('success', 'Thêm Nhân viên thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Thêm nhân viên thất bại');
            return false;
        }
        return true;
        
        
    }
    public function get()
    {
        return employees::orderby('id')->paginate(15);
    }
    

    public function destroy($request)
    {
        $employees = employees::where('id', (int)$request->input('id'))->first();
        if ($employees) {
            $employees->delete();
            return true;
        }
        return false;
    }

    public function update($request, $employees)
    {
        try {
            $employees->fill($request->input());
            $employees->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Cập nhật thất bại');
            return false;
        }
        return true;
    }
}
