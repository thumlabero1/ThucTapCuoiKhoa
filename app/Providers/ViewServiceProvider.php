<?php

namespace App\Providers;

use App\Http\Views\Composers\CartComposer;
use App\Http\Views\Composers\MenuComposer;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
    }


    public function boot()
    {

        View::composer('client.header', MenuComposer::class);
        View::composer('client.cartmodal', CartComposer::class);
    }
}
