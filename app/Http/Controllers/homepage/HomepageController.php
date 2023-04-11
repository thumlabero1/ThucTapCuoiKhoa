<?php

namespace App\Http\Controllers\homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //
    public function index()
    {
        return view('homepage.Main', [
            'title' => 'Shop'
        ]);
    }
}
