<?php

namespace App\Http\Views\Composers;

use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    protected $users;


    public function __construct()
    {
    }


    public function compose(View $view)
    {
        $menus =  Menu::select('id', 'name', 'parent_id')->where('active', 1)->orderbyDesc('id')->get();
        $view->with('menus', $menus);
    }
}
