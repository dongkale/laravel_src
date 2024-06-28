<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view("home", ["data" => "index"]);
    }

    public function dashboard_01()
    {
        // View::share('mainMenuCode', 'MENU_1');
        // View::share('subMenuCode', 'MENU_1_1');

        Log::info("dashboard_01");

        return view("home", ["data" => "dashboard_01"]);
    }

    public function dashboard_02()
    {
        // View::share("mainMenuCode", "MENU_1");
        // View::share("subMenuCode", "MENU_1_2");

        Log::info("dashboard_01");

        return view("home", ["data" => "dashboard_02"]);
    }

    public function dashboard_03()
    {
        // View::share("mainMenuCode", "MENU_1");
        // View::share("subMenuCode", "MENU_1_2");

        Log::info("dashboard_03");

        return view("home", ["data" => "dashboard_03"]);
    }
}
