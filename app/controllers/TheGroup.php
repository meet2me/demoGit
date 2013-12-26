<?php

class TheGroup extends BaseController {

    public function getHome()
    {
	// GROWING GROUP
	$groups = DB::table('tblGroup')->get();
	
	// GROWING ACCOUNT
	$accounts = DB::table('tblAccount')->get();
	
	return View::make('v0.home.index')
		->with('groups',$groups)
		->with('accounts',$accounts);
    }
    
    public function getGroup($group)
    { 
	//CHECKING GROUP
	$groupA = DB::table('tblGroup')->where('GroupID','=',$group)->first();
	
	
	//CHECKING GROUP PASSWORD 
	if($groupA->PassRequired == 0 ) { $need_password = 0; }
	elseif($groupA->PassRequired == 1 ) { $need_password = 1; }
	else { $need_password = 1; }
	
	
	//GROUP NAME AND INFORMATION
	//find data group name and information
	$resInf = DB::select("select 
		   tblGroup.ID,
		   tblGroup.GroupID,
		   tblGroup.Group,
		   tblAccount.AccName,
		   tblAccount.AdminTel,
		   tblAccount.AdminEmail
	       from 
		   tblAccount, tblGroup 
	       where 
		   tblAccount.ID = tblGroup.ID and
		   tblGroup.GroupID = '$group'");
	
	
	/*
	* GROWING MESSAGES
	*/
	$messages = DB::table('tblMessages')->get();
	
	
	/*
	* GROWING ADMIN & GROUP LEADER
	*/
	$resAL = DB::select( 
	   "select 
		* 
	    from 
		tblGrpMembrs, tblUser 
	    where 
		tblGrpMembrs.UserID = tblUser.userID and
		tblGrpMembrs.GroupID = '$group'
	    order by
		tblGrpMembrs.UserID desc");
	
	/*
	* LAST 10 NEW MEMBERS
	*/
	$dataLT = DB::select( 
	   "select 
		* 
	   from 
		tblGrpMembrs, tblUser 
	   where 
		tblGrpMembrs.UserID = tblUser.userID and
		tblGrpMembrs.GroupID = '$group'
	    order by
		tblGrpMembrs.UserID desc
	   limit
	       0,10");
	
       /*
	* ALL MEMBERS
	*/
       $dataALM = DB::select(
	   "select 
		* 
	    from 
		tblGrpMembrs, tblUser 
	    where 
		tblGrpMembrs.UserID = tblUser.userID and
		tblGrpMembrs.GroupID = '$group'
	    order by
		tblGrpMembrs.UserID desc");
       
	return View::make('demo.demo')
		->with('need_password',$need_password)
		->with('resInf',$resInf)
		->with('messages',$messages)
		->with('resAL',$resAL)
		->with('dataLT',$dataLT)
		->with('dataALM',$dataALM)
		->with('groupA',$groupA);
    }

    public function postJoinDo()
    {
	//catching value
	$group = Input::get('group');
	$firstname = Input::get('firstname');
	$lastname = Input::get('lastname');
	$email = Input::get('email');
	$phone = Input::get('phone');
	$userIP = $_SERVER['REMOTE_ADDR'];
	$created_at = date("Y-m-d", time());


	//
	// BECAUSE OF USERID IS VERY UNIQUE IN NAME, I MUST CALCULATE TO MAKE IT WORK :(
	//
	//get last userID
	$lastuserid = DB::select("select max(right(userID,4)) as weird from tblUser");
	
	foreach($lastuserid as $weird)
	{
	    $n_weird = $weird->weird;
	}
	
	//weird value + 1 to make this number unique
	$weirdValue = $n_weird + 1;

	//count weird string
	$lengthWeird = strlen($weirdValue);

	//creating weird userID: value
	if($lengthWeird == 1) { $currentWeird = "bbbb000".$weirdValue; }
	elseif($lengthWeird == 2) { $currentWeird = "bbbb00".$weirdValue; }
	elseif($lengthWeird == 3) { $currentWeird = "bbbb0".$weirdValue; }
	elseif($lengthWeird == 4) { $currentWeird = "bbbb".$weirdValue; }

	//affecting to tblUser
	$datatbluser = array(
	    'userID' => $currentWeird,
	    'firstname' => $firstname,
	    'lastname' => $lastname,
	    'email' => $email,
	    'phone' => $phone,
	    'userIP' => $userIP,
	    'created_at' => $created_at
	);
	DB::table('tblUser')->insert($datatbluser);
	

	//
	//AFFECTING TO TBLGRPMEMBRS
	//
	//need to find what is ID where GroupID = $group
	$dataA = DB::table('tblGroup')->where('GroupID','=',$group)->first();

	
	//insert into tblGrpMembrs
	DB::table('tblGrpMembrs')->insert(array(
		'ID' => $dataA->ID,
		'GroupID' => $dataA->GroupID,
		'UserID' => $currentWeird,
		'Leader' => '0'
	    ));
	


	echo "<h3>Yay... You are joining <span style='color: red;'>".$dataA->GroupID."</span> Group!</h3><br>Redirecting...";
	 
	echo "<script>
	    setTimeout(function()
	    {
		window.location.href='/".$group."';
	    },4000);
	</script>";
    }

    
}