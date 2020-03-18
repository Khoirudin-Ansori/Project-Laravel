<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index($value='')
    {
    	$admin=\App\User::all();
    	return view('admin.index',['admin'=>$admin]);
    }
}
