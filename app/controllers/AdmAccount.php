<?php

class AdmAccount extends BaseController 
{
    public function getIndex()
    {
	if(Auth::check() && Auth::user()->userID == 1) : return Redirect::to("/adm/dashboard") ; 
	else : return Redirect::to('/adm/login') ;
	endif;
    }
    
    public function getAccount()
    {
	$accounts = DB::table('tblAccount')->get();
	return View::make('adm.account.account')
		->with('accounts',$accounts);
	
    }
    
    public function getAccountAdd()
    {
	if(Auth::user()->userID != 1) : return Redirect::to("/") ; endif;
	
	$acc = DB::table('tblAccount')->where('ID','=',Input::get('ID'))->first();

	return View::make('adm.account.addaccount')
		->with('acc',$acc);
	
    }
    
    public function postAccountAdd()
    {
	$data = array(
	    'ID' => Input::get('ID'),
	    'AccID' => Input::get('AccID'),
	    'AccName' => Input::get('AccName'),
	    'AdminTel' => Input::get('AdminTel'),
	    'AdminEmail' => Input::get('AdminEmail')
	);
	
	$rules = array(
	    'ID' => 'required',
	    'AccID' => 'required',
	    'AccName' => 'required',
	    'AdminTel' => 'required',
	    'AdminEmail' => 'required|email'
	);
	
	$validator = Validator::make($data,$rules);
	
	if($validator->passes()) 
	{
	    //INSERTING TBLACCOUNT
	    DB::table('tblAccount')->insert($data);
	    
	}
	else
	{
	    return Redirect::to('/adm/account/add')
		    ->withErrors($validator)
		    ->withInput();
	     
	}
    }
    
    public function getAccountEdit()
    {
	if(Auth::user()->userID != 1) : return Redirect::to("/") ; endif;
	
	$acc = DB::table('tblAccount')->where('ID','=',Input::get('ID'))->first();

	return View::make('adm.account.editaccount')
		->with('acc',$acc);
	
    }
    
    public function postAccountEdit()
    {
	$data = array(
	    'ID' => Input::get('ID'),
	    'AccID' => Input::get('AccID'),
	    'AccName' => Input::get('AccName'),
	    'AdminTel' => Input::get('AdminTel'),
	    'AdminEmail' => Input::get('AdminEmail')
	);
	
	$rules = array(
	    'ID' => 'required',
	    'AccID' => 'required',
	    'AccName' => 'required',
	    'AdminTel' => 'required',
	    'AdminEmail' => 'required'
	);
	
	$validator = Validator::make($data,$rules);
	
	if($validator->passes()) 
	{
	    //SEE RELATIONAL TABLE, FIND ID RELATED
	    //updating tblAccount
	    DB::table('tblAccount')->where('ID','=',Input::get('ID'))->update($data);
	    
	    //updating tblAdmin
	    DB::table('tblAdmin')->where('ID','=',Input::get('ID'))->update(array('ID'=>Input::get('ID')));
	    
	    //updating tblGroup
	    DB::table('tblGroup')->where('ID','=',Input::get('ID'))->update(array('ID'=>Input::get('ID')));
	    
	    //updating tblMessages
	    DB::table('tblMessages')->where('ID','=',Input::get('ID'))->update(array('ID'=>Input::get('ID')));
	    
	    //updating tblMsgGroups
	    DB::table('tblMsgGroups')->where('ID','=',Input::get('ID'))->update(array('ID'=>Input::get('ID')));
	    
	    //updating tblStop
	    DB::table('tblStop')->where('ID','=',Input::get('ID'))->update(array('ID'=>Input::get('ID')));
	    
	    //updating tblStop
	    DB::table('tblStop')->where('ID','=',Input::get('ID'))->update(array('ID'=>Input::get('ID')));
	    
	    //updating tblGrpMembrs
	    DB::table('tblGrpMembrs')->where('ID','=',Input::get('ID'))->update(array('ID'=>Input::get('ID')));
	    
	    //updating tblRemove
	    DB::table('tblRemove')->where('ID','=',Input::get('ID'))->update(array('ID'=>Input::get('ID')));
	    
	    //echo '{ "success": true }';
	    
	}
	else
	{
	    return Redirect::to('/adm/account/add')
		    ->withErrors($validator)
		    ->withInput();
	     
	}
    }
    
    public function getAccountDelete()
    {
	return "This can't perform now...";
    }
    
    
}