<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{

    public function showformregister()
    {
        if (Auth::check()) {
            return redirect()->route(('main-client'));
        }
        return view('client.user.register', [
            "title" => "Đăng ký"
        ]);
    }
    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        $this->validate($request, [
            "name" => "required",
            "email" => "required|email:filter",
            "password" => "required|min:6",
            "phone" => "required|min:9",
            "address" => 'required'
        ]);

        $users = User::where('email', $request->email)->get();

        if (sizeof($users) > 0) {
            $msg = 'Email đã tồn tại';
            Session::flash('error', $msg);
            return redirect()->back();
        }


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;



        $user->save();
        Session::flash('success', "Đăng kí thành công");
        return redirect()->route('show-form-login');
    }
    public function showformlogin()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('client.user.login', [
            "title" => "Đăng nhập"
        ]);
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email:filter",
            "password" => "required|min:6",
            'g-recaptcha-response' => 'required|captcha',
        ]);
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'))) {
            return redirect()->route('main-client');
        }
        Session::flash('error', 'Email hoặc password không chính xác');
        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        Session::forget('carts');
        return redirect('/login');
    }
    // google login
    public function getGoogleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    public function getGoogleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->email)->first();

            if (!$user) {
                //$uuid = Str::uuid()->toString();
                $user = new User();
                $user->name = $google_user->name;
                $user->email = $google_user->email;
                $user->password = bcrypt($user->email);
                $user->profile_photo_path = $google_user->avatar;
                $user->save();
                    }

            Auth::login($user);
            // Lưu thông tin người dùng vào session
        session(['user_name' => $user->name, 'user_email' => $user->email]);
            return redirect()->intended('/');
        } catch (\Throwable $th) {
            dd('something went wrong' . $th->getMessage());
        }}
}
