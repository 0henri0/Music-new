<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class homeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        return view('pages.home');
    }
}
