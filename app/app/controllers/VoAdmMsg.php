<?php

class VoAdmMsg extends BaseController {
    
    
    public function postEditAdminWelcomeMessage()
    {
	
	$ID = Input::get('ID');
	$GroupID = Input::get('GroupID');
	$idx = Input::get('idx');
	
	$msg = DB::table('tblAdminMessage')->where('idx','=',$idx)->first();
	
	return View::make('v0.tabpage.body2_nmm_edit')
		->with('idx',$idx)
		->with('ID',$ID)
		->with('GroupID',$GroupID)
		->with('msg',$msg);
    }
    
    public function postSavingAdminWelcomeMessage()
    {
	$idx = Input::get('idx');
	$ID = Input::get('ID');
	$GroupID = Input::get('GroupID');
	$Subject = Input::get('Subject');
	$Body = Input::get('Body');
	$Active = Input::get('Active');
	$Email = Input::get('Email');
	$SMS = Input::get('SMS');
	$Days = Input::get('Days');
	$Hours = Input::get('Hours');
	$Minutes = Input::get('Minutes');
	
	
	//activating one of them and saving message
	DB::table('tblAdminMessage')->where('idx','=',$idx)->update(array(
	    'Subject' => $Subject,
	    'Body' => $Body,
	    'Active' => $Active,
	    'Email' => $Email,
	    'SMS' => $SMS,
	    'Days' => $Days,
	    'Hours' => $Hours,
	    'Minutes' => $Minutes
	));
    }
    
}