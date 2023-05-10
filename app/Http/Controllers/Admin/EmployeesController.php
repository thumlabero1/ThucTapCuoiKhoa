<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\EmployeesService;
use App\Http\Requests\Employees\EmployeesRequest;
use App\Models\employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    protected $EmployeesService;
    public function __construct(EmployeesService $EmployeesService)
    {
        $this->EmployeesService = $EmployeesService;
    }
    public function index()
    {
        return view('admin.Employees.list', [
            "title" => "Danh sách Nhân viên",
            "employees" => $this->EmployeesService->get()
        ]);
    }
    public function create()
    {
        return view('admin.Employees.add', [
            "title" => "Thêm Nhân viên"
        ]);
    }
    
    public function store(EmployeesRequest $request)
    {
        $result = $this->EmployeesService->create($request);
        return  redirect()->back();
    }

    public function update(employees $employees, employeesRequest $request)
    {
        $res = $this->EmployeesService->update($employees, $request);
        if ($res) {
            return redirect('/admin/employees/list');
        }

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->EmployeesService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                "message" => "Xóa thành công"
            ]);
        } else {
            return response()->json([
                'error' => true,
                "message" => "Xóa thất bại"
            ]);
        }
    }


    public function show(employees $employees)
    {
        return view('admin.employees.edit', [
            "title" => "Chỉnh sửa : " . $employees->name,
            "employees" => $employees
        ]);
    }
}
