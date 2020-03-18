<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Hash;
use Validator;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function change()
    {
    	return view('home');
    }

    public function update()
    {
    	Validator::extend('password',function($attribute,$value,$parameters,$validator){
    		return Hash::check($value, \Auth::user()->password);
    	});

    	$message = [
    		'password'=>'Invalid curent password,',
    	];

    	$validator = Validator::make(request()->all(),[
    		'current_password' 		=> 'required|password',
    		'password'				=> 'required|min:6|confirmed',
    		'password_confirmation'	=> 'required',
    	], $message);

    	if ($validator->fails()) {
    		return redirect()->back()->withErrors($validator->errors());
    	}

    	$user = User::find(Auth::id());
    	$user->password = bcrypt(request('password'));
    	$user->save();

    	return redirect('home')->withSuccess('Password has been Update.');
    }
}
