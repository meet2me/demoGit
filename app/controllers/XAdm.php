<?php

class XAdm extends BaseController 
{
    public function getLogin()
    {
	return View::make('adm.login.login');
    }
    
    public function postLoginDo()
    {
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
    
    public function getLoginDo()
    {
	$ndata = array(
	    'email' => Input::get('email'),
	    'password' => Input::get('password')
	);
	
	$rules = array(
	    'email'=>'required',
	    'password'=>'required'
	);
	
	$validator = Validator::make($ndata,$rules);
	
	if($validator->passes()) 
	{
	    if(Auth::attempt($ndata))
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
	    echo "not passes";
	     
	}
    }
    
    public function getDashboard()
    {
	return View::make('adm.dashboard.dashboard');
    }
    
    public function getGroup()
    {
	$groups = DB::table('tblGroup')->get();
	
	$idnyas = DB::table('tblAccount')->get();
	
	return View::make('adm.group.group')
		->with('groups',$groups)
		->with('idnyas',$idnyas);
    }
    
    public function getGroupAdd()
    {
	return View::make('adm.group.addgroup');
    }
    
    public function postGroupAdd()
    {
	$data = array(
	    'ID' => Input::get('ID'),
	    'GroupID' => Input::get('GroupID'),
	    'Group' => Input::get('Group'),
	    'PassRequired' => Input::get('PassRequired')
	);
	
	$rules = array(
	    'ID'=>'required',
	    'GroupID'=>'required'
	);
	
	$validator = Validator::make($data,$rules);
	
	if($validator->passes()) 
	{
	    DB::table('tblGroup')->insert($data);
	    return Redirect::to('/adm/group');
	}
	else
	{
	    return Redirect::to('/adm/group/add')
		    ->withErrors($validator)
		    ->withInput();
	     
	}
    }
    
    public function getGroupEdit()
    {
	$group = DB::table('tblGroup')->where('idx','=',Input::get('idx'))->first();
	
	return View::make('adm.group.editgroup')
		->with('group',$group);
    }
    
    public function postGroupEdit()
    {
	$data = array(
	    'ID' => Input::get('ID'),
	    'GroupID' => Input::get('GroupID'),
	    'Group' => Input::get('Group'),
	    'PassRequired' => Input::get('PassRequired')
	);
	
	$rules = array(
	    'ID'=>'required',
	    'GroupID'=>'required'
	);
	
	$validator = Validator::make($data,$rules);
	
	if($validator->passes()) 
	{
	    //IDX IS THE ID OF TABLE GROUP. SO, FIRST WE MUST FIND OUT WHAT IS ID AND GROUPID
	    $group = DB::table('tblGroup')->where('idx','=',Input::get('idx'))->first();
	    
	    
	    //UPDATE TBLGROUP
	    DB::table('tblGroup')->where('idx','=',Input::get('idx'))->update($data);
	    
	    
	    //UPDATE TBLGRPMEMBRS
	    //update ID
	    DB::table('tblGrpMembrs')->where('ID','=',$group->ID)->update(array('ID'=>Input::get('ID')));
	    
	    //update GroupID
	    DB::table('tblGrpMembrs')->where('GroupID','=',$group->GroupID)->update(array('GroupID'=>Input::get('GroupID')));
	    
	    
	    //UPDATE TBLREMOVE
	    //update ID
	    DB::table('tblRemove')->where('ID','=',$group->ID)->update(array('ID'=>Input::get('ID')));
	    
	    //update GroupID
	    DB::table('tblRemove')->where('GroupID','=',$group->GroupID)->update(array('GroupID'=>Input::get('GroupID')));
	    
	    
	    //UPDATE TBLSTOP
	    //update ID
	    DB::table('tblStop')->where('ID','=',$group->ID)->update(array('ID'=>Input::get('ID')));
	    
	    //update GroupID
	    DB::table('tblStop')->where('GroupID','=',$group->GroupID)->update(array('GroupID'=>Input::get('GroupID')));
	    
	    
	    //UPDATE TBLACCOUNT
	    //update ID
	    DB::table('tblAccount')->where('ID','=',$group->ID)->update(array('ID'=>Input::get('ID')));
	    

	    //UPDATE TBLMSGGROUPS
	    //update ID
	    DB::table('tblMsgGroups')->where('ID','=',$group->ID)->update(array('ID'=>Input::get('ID')));
	    
	    //update GroupID
	    DB::table('tblMsgGroups')->where('GroupID','=',$group->GroupID)->update(array('GroupID'=>Input::get('GroupID')));
	    
	    
	    //UPDATE TBLMESSAGES
	    //update ID
	    DB::table('tblMessages')->where('ID','=',$group->ID)->update(array('ID'=>Input::get('ID')));
	    
	    
	    //UPDATE TBLADMIN
	    //update ID
	    DB::table('tblAdmin')->where('ID','=',$group->ID)->update(array('ID'=>Input::get('ID')));
	    
	    
	    
	    return Redirect::to('/adm/group');
	}
	else
	{
	    return Redirect::to('/adm/group/add')
		    ->withErrors($validator)
		    ->withInput();
	}
    }
}