<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->cookie('logueo')==null){
            $minutes = 60;
            $date=new \DateTime;
            Cookie::queue(Cookie::make('logueo', $date->format('Y-m-d H:i:s'), $minutes));
        }
        return view('home');
    }
}
