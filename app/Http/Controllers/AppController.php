<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;

class AppController extends Controller
{
  public function __construct()
  {
      //$this->middleware('auth');
      $this->middleware('example', ['only'=>['index']]);
  }

  public function index()
  {
      return view('ud6');
  }
}
