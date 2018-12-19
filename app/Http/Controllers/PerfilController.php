<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PerfilController extends Controller
{
     public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(Request $request)
    {
        return view('perfil', array('editable'=>$request->input('editable')));
    }

    public function cambiar(Request $request)
    {
    	$user=User::find($request->input('id'));
    	$user->name=$request->input('nombre');
    	$user->email=$request->input('email');
    	$user->save();
    	return redirect('perfil');
    }
}
