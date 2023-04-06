<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Employees\EmployeesService;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Termwind\Components\Dd;
use App\Models\Employees;

class EmployeesController extends Controller
{
    protected $EmployeesService;

    public function __construct(EmployeesService $EmployeesService)
    {
      
      $this->EmployeesService = $EmployeesService;
    }
    public function index()
 {
  # code...pEmployeesService
  return view('admin.Employees.list', [
    'title' =>'danh sách Nhân Viên',
     'Employees' => $this->EmployeesService->getAll()
  ]);
 }
}
