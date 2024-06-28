<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view("home");
    }

    public function menu1_1()
    {
        View::share("mainMenuCode", "Menu1");
        View::share("subMenuCode", "Menu1_1");

        Log::info("[Menu][1] 1");

        // $vv1 = Request::is("/Menu1*");
        // $vv2 = Request::is("/Menu1_1");
        // $vv3 = Request::is("/Menu2*");

        // Log::info("[Menu][1] -- {$vv1}, {$vv2}, {$vv3}");

        return view("home");
    }

    public function menu1_2()
    {
        View::share("mainMenuCode", "Menu1");
        View::share("subMenuCode", "Menu1_2");

        Log::info("[Menu][1] 2");

        return view("home");
    }
    public function menu1_3()
    {
        View::share("mainMenuCode", "Menu1");
        View::share("subMenuCode", "Menu1_3");

        Log::info("[Menu][1] 3");

        return view("home");
    }

    public function menu2_1()
    {
        View::share("mainMenuCode", "Menu2");
        View::share("subMenuCode", "Menu2_1");

        Log::info("[Menu][2] 1");

        return view("home");
    }

    public function menu2_2()
    {
        View::share("mainMenuCode", "Menu2");
        View::share("subMenuCode", "Menu2_2");

        Log::info("[Menu][2] 2");

        return view("home");
    }
    public function menu2_3()
    {
        View::share("mainMenuCode", "Menu2");
        View::share("subMenuCode", "Menu2_3");

        Log::info("[Menu][2] 3");

        return view("home");
    }
}
