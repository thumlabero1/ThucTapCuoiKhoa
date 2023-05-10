<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard');;
        }
        echo view('admin.users.login', [
            "title" => "Login"
        ]);
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            "email" => "required|email:filter",
            "password" => "required|min:6"
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'))) {
            return redirect()->route('dashboard');
        }
        Session::flash('error', 'Email hoặc password không chính xác');
        return redirect()->back();
    }
}
