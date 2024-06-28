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
        return view("home", ["data" => "home"]);
    }

    public function Charts()
    {
        View::share("mainMenuCode", "MENU_1");
        View::share("subMenuCode", "Charts");

        return view("home", ["data" => "Charts Menu"]);
    }

    public function Reports()
    {
        View::share("mainMenuCode", "MENU_1");
        View::share("subMenuCode", "Reports");

        Log::info("menu1_1");
        return view("home", ["data" => "Reports Menu"]);
    }

    public function Tables()
    {
        View::share("mainMenuCode", "MENU_1");
        View::share("subMenuCode", "Tables");

        return view("home", ["data" => "Tables Tables"]);
    }

    public function Setting()
    {
        View::share("mainMenuCode", "MENU_2");
        View::share("subMenuCode", "Setting");

        return view("home", ["data" => "Setting Menu"]);
    }

    public function statisticsUser()
    {
        View::share("mainMenuCode", "MENU_3");
        View::share("subMenuCode", "statisticsUser");

        return view("home", ["data" => "statisticsUser  Menu"]);
    }

    public function tasks()
    {
        View::share("mainMenuCode", "MENU_4");
        View::share("subMenuCode", "tasks");

        return view("home", ["data" => "tasks Menu"]);
    }
}
