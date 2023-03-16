<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Termwind\Components\Dd;

class MenuController extends Controller
{
    //
 public function create(){

    return view('admin.menus.add',[
      'title' => 'Thêm danh mục mới',
    ]);
 }
 public function store(Request $request)
 {
   dd($request);
 }

}
