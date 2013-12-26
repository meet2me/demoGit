<?php

class Adm extends BaseController {

    public function getLogin()
    {
	return View::make('adm.login.login');
    }
    
    public function postLogin()
    {
	echo Input::get('email');
	echo "<br>";
	echo Input::get('password');
    }
    
    public function postLoginV()
    {
	echo Input::get('email');
	echo "<br>";
	echo Input::get('password');
	
	$data = array(
	    'email' => Input::get('email'),
	    'password' => Input::get('password')
	);
	
	$rules = array(
	    'email'=>'required',
	    'password'=>'required'
	);
	
	$validator = Validator::make($data,$rules);
	
	if($validator->passes()) 
	{
	    if(Auth::attempt($data))
	    {
		return Redirect::to('/adm/dashboard');
	    }
	    else
	    {
		return Redirect::to('/adm/login')
			->with('login_errors',true);
	    }
	}
	else
	{
	    return Redirect::to('/adm/login')
		    ->with('login_errors',true);
	     
	}
    }
    
    public function getDashboard()
    {
	return View::make('adm.dashboard.dashboard');
    }
    
    
}