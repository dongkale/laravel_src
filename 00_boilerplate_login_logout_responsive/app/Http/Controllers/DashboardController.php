<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view("dashboard.index");
    }

    public function menu_1()
    {
        return view("dashboard.menu_1");
    }
    public function menu_2()
    {
        return view("dashboard.menu_2");
    }

    public function setting()
    {
        return view("dashboard.setting");
    }
}
