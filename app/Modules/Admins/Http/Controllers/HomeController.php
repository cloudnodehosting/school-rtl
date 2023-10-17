<?php

namespace App\Modules\Admins\Http\Controllers;

use App\Models\Inquery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inqueries = Inquery::get();

        return view('admin.home', compact('inqueries'));
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
