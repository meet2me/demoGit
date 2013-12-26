<?php

class VoOne extends BaseController {
    
    
    public function getIndex()
    {
	return View::make('v0.index.index');
    }
    
    public function getHome()
    {
	return View::make('v0.home.home');
    }
    
    public function getRegister()
    {
	return View::make('v0.register.register');
    }
    
    public function getConfirm()
    {
	$dataGroup = DB::table('tblGroup')
		->where('ID','=',Input::get('ID'))
		->where('GroupID','=',Input::get('GroupID'))
		->first();
	
	return View::make('v0.confirm.confirm')
		->with('dataGroup',$dataGroup);
    }
    
    public function getAbout()
    {
	return View::make('v0.about.about');
    }
    
    public function getFeedback()
    {
	return View::make('v0.feedback.feedback');
    }

    public function getLogin()
    {
	// GROWING GROUP
	$groups = DB::table('tblGroup')->get();
	
	// GROWING ACCOUNT
	$accounts = DB::table('tblAccount')->get();
	
	return View::make('v0.login.login')
		->with('groups',$groups)
		->with('accounts',$accounts);
    }
    
    public function postLogin()
    {
	$data = array(
	    'email' => Input::get('email'),
	    'password' => Input::get('password')
	);
	
	if(Auth::attempt($data))
	{
	    //http://stackoverflow.com/questions/15777824/cant-set-cookies-in-laravel-4
	    //http://stackoverflow.com/questions/15873535/laravel-4-cookies-arent-saved-on-local-server
	    $cookieUserID = Cookie::forever('userID', Auth::user()->userID);
	    $cookieEmail = Cookie::forever('email', Input::get('email'));
	    $cookiePassword = Cookie::forever('password', Input::get('password'));
	    
	    Response::make()->withCookie($cookieUserID)->withCookie($cookieEmail)->withCookie($cookiePassword);
	    
	    echo "success";
	}
	else
	{
	    echo "fail";
	}
    }
    
    public function getLogout()
    {
	Auth::logout();	
	return Redirect::to('/'.$_GET['ID'].'/'.$_GET['GroupID']);
    }
    
    /*
    public function getIndex()
    {
	// GROWING GROUP
	$groups = DB::table('tblGroup')->get();
	
	// GROWING ACCOUNT
	$accounts = DB::table('tblAccount')->get();
	
	return View::make('home.index')
		->with('groups',$groups)
		->with('accounts',$accounts);
    }
     * 
     */
    
    public function getTabPageTest($ID,$GroupID)
    {
	
	if(Cookie::get('userID'))
	{
	    $data = array(
		'email' => Cookie::get('email'),
		'password' => Cookie::get('password')
	    );

	    if(Auth::attempt($data))
	    {
		//http://stackoverflow.com/questions/15777824/cant-set-cookies-in-laravel-4
		//http://stackoverflow.com/questions/15873535/laravel-4-cookies-arent-saved-on-local-server
		$cookieUserID = Cookie::forever('userID', Auth::user()->userID);
		$cookieEmail = Cookie::forever('email', Input::get('email'));
		$cookiePassword = Cookie::forever('password', Input::get('password'));

		Response::make()->withCookie($cookieUserID)->withCookie($cookieEmail)->withCookie($cookiePassword);
	    }
	}
	
	
	//CHECKING THIS USER TYPE
	if(Auth::check())
	{
	    //checking user type basic or leader (Basic member is user who is not leader or admin)
	    $CheckingUserType = DB::table('tblGrpMembrs')
		    ->where('ID','=',$ID)
		    ->where('GroupID','=',$GroupID)
		    ->where('UserID','=',Auth::user()->userID)
		    ->first();
	    
	    if(!$CheckingUserType) { $TrueUserType = "Not Member"; }
	    elseif($CheckingUserType->Leader == 0) { $TrueUserType = "Basic"; }
	    elseif($CheckingUserType->Leader == 1){ $TrueUserType = "Leader"; }

	    //checking an admin. And if user is an admin, all of above is replacing by an admin type
	    $CheckingUserTypeForAdmin = DB::table('tblAdmin')
		    ->where('ID','=',$ID)
		    ->where('UserID','=',Auth::user()->userID)
		    ->count();
	    if($CheckingUserTypeForAdmin == 1 ) { $TrueUserType = "Admin"; }
	}
	else
	{
	    $TrueUserType = "Not Login";
	}
	
    }
    
    
    public function getTabPage($ID,$GroupID)
    {
	
	if(Cookie::get('userID'))
	{
	    $data = array(
		'email' => Cookie::get('email'),
		'password' => Cookie::get('password')
	    );

	    if(Auth::attempt($data))
	    {
		//http://stackoverflow.com/questions/15777824/cant-set-cookies-in-laravel-4
		//http://stackoverflow.com/questions/15873535/laravel-4-cookies-arent-saved-on-local-server
		$cookieUserID = Cookie::forever('userID', Auth::user()->userID);
		$cookieEmail = Cookie::forever('email', Input::get('email'));
		$cookiePassword = Cookie::forever('password', Input::get('password'));

		Response::make()->withCookie($cookieUserID)->withCookie($cookieEmail)->withCookie($cookiePassword);
	    }
	}
	
	
	//CHECKING THIS USER TYPE
	if(Auth::check())
	{
	    //checking user type basic or leader (Basic member is user who is not leader or admin)
	    $CheckingUserType = DB::table('tblGrpMembrs')
		    ->where('ID','=',$ID)
		    ->where('GroupID','=',$GroupID)
		    ->where('UserID','=',Auth::user()->userID)
		    ->first();
	    if(!$CheckingUserType) { $TrueUserType = "Not Member"; }
	    elseif($CheckingUserType->Leader == 0) { $TrueUserType = "Basic"; }
	    elseif($CheckingUserType->Leader == 1){ $TrueUserType = "Leader"; }
	    

	    //checking an admin. And if user is an admin, all of above is replacing by an admin type
	    $CheckingUserTypeForAdmin = DB::table('tblAdmin')
		    ->where('ID','=',$ID)
		    ->where('UserID','=',Auth::user()->userID)
		    ->count();
	    if($CheckingUserTypeForAdmin == 1 ) { $TrueUserType = "Admin"; }
	}
	else
	{
	    $TrueUserType = "Not Login";
	}
	
	
	//ACCOUNT INFORMATION
	$resInf = DB::table('tblAccount')
		->where('ID','=',$ID)
		->first();
	
	
	//GROUP INFORMATION
	$dataGroup = DB::table('tblGroup')->where('ID','=',$ID)->where('GroupID','=',$GroupID)->first();
	

	//GROWING MESSAGES
	$messages = DB::table('tblMessages')
		->where('ID','=',$ID)
		->where('GroupID','=',$GroupID)
		->orderBy('MsgID','desc')
		->skip(0)
		->take(10)
		->get();
	

	//GROWING ADMIN & GROUP LEADER
	$resAL = DB::select("
		select
		    *
		from
		    v_group_members_information
		where
		    ID = '$ID' and
		    GroupID = '$GroupID' and
		    (
			Leader = '1' or
			Admin is not null
		    )
		order by
		    created_at desc
	    ");


	//LAST 10 NEW MEMBERS
	$dataLT = DB::select("
		select 
		    tblGrpMembrs.ID,
		    tblGrpMembrs.GroupID,
		    tblUser.userID,
		    tblUser.firstname,
		    tblUser.lastname,
		    tblUser.email,
		    tblUser.phone,
		    tblGrpMembrs.Leader
		from
		    tblGrpMembrs, tblUser
		where
		    tblGrpMembrs.ID = '$ID' and
		    tblGrpMembrs.GroupID = '$GroupID' and
		    tblGrpMembrs.UserID = tblUser.userID
		order by
		    tblGrpMembrs.created_at desc
		limit
		    0,10
	    ");
	
	//Other Current Members
	$dataOCMs = DB::select("
		select
		    *
		from
		    v_group_members_information
		where
		    ID = '$ID' and
		    GroupID = '$GroupID' and
		    (
			Leader <> '1' and
			Admin is null
		    )
		order by
		    created_at desc
	    ");


	//ALL MEMBERS
	$dataALM = DB::select("
		select 
		    tblGrpMembrs.ID,
		    tblGrpMembrs.GroupID,
		    tblUser.userID,
		    tblUser.firstname,
		    tblUser.lastname,
		    tblUser.email,
		    tblUser.phone,
		    tblGrpMembrs.Leader
		from
		    tblGrpMembrs, tblUser
		where
		    tblGrpMembrs.ID = '$ID' and
		    tblGrpMembrs.GroupID = '$GroupID' and
		    tblGrpMembrs.UserID = tblUser.userID
		order by
		    tblGrpMembrs.created_at desc
	    ");

	
		
	return View::make('v0.tabpage.index')
		->with('TrueUserType',$TrueUserType)
		->with('resInf',$resInf)
		->with('dataGroup',$dataGroup)
		->with('messages',$messages)
		->with('resAL',$resAL)
		->with('dataLT',$dataLT)
		->with('dataOCMs',$dataOCMs)
		->with('dataALM',$dataALM)
		->with('ID',$ID)
		->with('GroupID',$GroupID);
	
    }
    
    
    public function postRegister()
    {
	//catching value
	$group = Input::get('group'); //this is an idx in tblGroup
	$firstname = Input::get('firstname');
	$lastname = Input::get('lastname');
	$email = Input::get('email');
	$phone = Input::get('phone');
	$password = Input::get('password');
	$userIP = $_SERVER['REMOTE_ADDR'];
	$user_token = rand(1000000000, 9999999999);
	$created_at = date("Y-m-d H:i:s", time());
	$verification_code = rand(1000, 9999);
	
	//checking an email
	$countEmail = DB::table('tblUser')->where('email','=',$email)->count();
	
	//if user already registered by email
	if($countEmail > 0) 
	{
	    return "fail"; 
	}
	else
	{
	
	    //FROM idx, FIND OUT WHAT ID and GroupID
	    $whatGroup = DB::table('tblGroup')->where('idx','=',$group)->first();
	    $ID = $whatGroup->ID;
	    $GroupID = $whatGroup->GroupID;
	    $Group = $whatGroup->Group;
	    
	    
	    //
	    //* Find an Account
	    //
	    $whatAcc = DB::table('tblAccount')->where('ID','=',$ID)->first();
	    $accName = $whatAcc->AccName;

	    //
	    // BECAUSE OF USERID IS VERY UNIQUE IN NAME, I MUST CALCULATE TO MAKE IT WORK :(
	    // 
	    //get last userID
	    $lastuserid = DB::select("select max(right(userID,4)) as weird from tblUser where UserType <> 'su'");

	    foreach($lastuserid as $weird)
	    {
		$n_weird = $weird->weird;
	    }

	    //echo $n_weird;


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
		'password' => Hash::make($password),
		'verification_code' => $verification_code,
		'user_token' => $user_token,
		'created_at' => $created_at
	    );
	    DB::table('tblUser')->insert($datatbluser);

	    //
	    // * Sending an email to the user
	    //
	    $message_subject = "Thank you for joining the ".$Group." Group of the ".$accName." Account";
	    $the_message = "To be able to receive messages from this Group please click the link below. <br><a href='http://groupmessage.co.uk/confirm?ID=".$ID."&GroupID=".$GroupID."&email=".$email."&utok=".$user_token."#validate'>Click Me!</a>";
	    $headerx = 'MIME-Version: 1.0' . "\r\n".'Content-type: text/html; charset=iso-8859-1' . "\r\n"."From: GroupMessage <noreply@groupmessage.co.uk>"."\r\n";
	    mail($email, $message_subject, $the_message, $headerx);
	    
	    
	    //AFFECTING TO TBLGRPMEMBRS
	    //insert into tblGrpMembrs
	    DB::table('tblGrpMembrs')->insert(array(
		    'ID' => $ID,
		    'GroupID' => $GroupID,
		    'UserID' => $currentWeird,
		    'Leader' => '0',
		    'created_at' => $created_at
		));
	    
	    
	    //
	    //*Messages Confirmation
	    //
	    DB::table('tblMessages')->insert(array(
		'ID' => $ID,
		'GroupID' => $GroupID,
		'MsgDateTime' => date("Y-m-d H:i:s", time()),
		'Subject' => 'Validate Email / Join Group Confirmation',
		'Body' => 'Lorem Ipsum... Colin will explain for this message',
		'Email' => '1',
		'Special' => $currentWeird
	    ));
	    
	    
	    //
	    //*Sending email to user with delay
	    //
	    //find email current group
	    $delaymails = DB::table('tblAdminMessage')
		    ->where('ID','=',$ID)
		    ->where('GroupID','=',$GroupID)
		    ->where('Active','=',1)
		    ->get();
	    foreach($delaymails as $dlm)
	    {
		//calculating time
		$dateinterval = 'P'.$dlm->Days."DT".$dlm->Hours."H".$dlm->Minutes."M";
		$countdate = new DateTime();
		$countdate->add(new DateInterval($dateinterval));
		$SendingTimex = $countdate->format('Y-m-d H:i');
		$SendingTime = $SendingTimex.":01";
		
		//insert into database
		DB::table('tblEmailQueue')->insert(array(
		    'email' => $email,
		    'ID' => $dlm->ID,
		    'GroupID' => $dlm->GroupID,
		    'Subject' => $dlm->Subject,
		    'Body' => $dlm->Body,
		    'SendingTime' => $SendingTime
		));
	    }
	    
	    
	    return "&email=".$email."&utok=".$user_token;
	}
    }
    
    public function getRegisterJoinValidation()
    {
	$ID = Input::get('ID');
	$GroupID = Input::get('GroupID');
	$email = Input::get('email');
	$user_token = Input::get('utok');
	
	//looking for user 
	$user = User::where('email','=',Input::get('email'))->first();
	Auth::login($user);
	
	return Redirect::to('/'.$ID.'/'.$GroupID.'#p2');
    }
    
    
    public function postCheckedAdmin() 
    {
	//on tblAdmin
	DB::table('tblAdmin')->insert(array(
	    'ID' => Input::get('ID'),
	    'UserID' => Input::get('id')
	));
	
    }
    
    public function postUnCheckedAdmin()
    {
	DB::table('tblAdmin')->where('ID','=',Input::get('ID'))->where('UserID','=',Input::get('id'))->delete();
    }
    
    public function postCheckedLeader()
    {
	DB::table('tblGrpMembrs')
		->where('ID','=',Input::get('ID'))
		->where('GroupID','=',Input::get('GroupID'))
		->where('UserID','=',Input::get('id'))
		->update(array('Leader' => '1' ));
    }
    
    public function postUnCheckedLeader()
    {
	DB::table('tblGrpMembrs')
		->where('ID','=',Input::get('ID'))
		->where('GroupID','=',Input::get('GroupID'))
		->where('UserID','=',Input::get('id'))
		->update(array('Leader' => '0' ));
    }
    
    
    public function cadangan_postSendMessage()
    {
	//CATCH VALUE FROM URL
	$selectAllGroups = Input::get('selectAllGroups'); //value is 0 or 1
	$currentGroupMembers = Input::get('currentGroupMembers'); //value is 0 or 1
	
	$ID = Input::get('ID');
	$GroupID = Input::get('GroupID');
	$message_subject = Input::get('message_subject');
	$the_message = Input::get('xxx');
	
	//MESSAGE FOR ALL GROUPS
	if($selectAllGroups == 1)
	{
	    //ALL MEMBER OF CURRENT ID
	    $members = DB::select("
		    select 
			*
		    from
			tblGrpMembrs, tblUser
		    where
			tblGrpMembrs.UserID = tblUser.userID and
			tblGrpMembrs.ID = '$ID'
		");


	    foreach($members as $member)
	    {
		$headerx = 'MIME-Version: 1.0' . "\r\n".'Content-type: text/html; charset=iso-8859-1' . "\r\n"."From: GroupMessage <noreply@groupmessage.com>"."\r\n";
		mail($member->email, $message_subject, $the_message, $headerx);

	    }
	
	    //INSERT DATA INTO DATABASE WHICH THEM OWNED BY ID
	    //populating groups
	    $groups = DB::table('tblGroup')->where('ID','=',$ID)->get();
	    
	    foreach($groups as $group)
	    {
		DB::table('tblMessages')->insert(array(
		    'ID' => $ID,
		    'GroupID' => $group->GroupID,
		    'MsgDateTime' => date("Y-m-d", time()),
		    'Subject' => $message_subject,
		    'Body' => $the_message,
		    'Email' => '1'
		));
	    }
	    
	    echo "success";
	}
	
	
	//MESSAGE FOR CURRENT GROUP
	if($currentGroupMembers == 1)
	{
	    //ALL MEMBER OF CURRENT ID AND GROUPID
	    $members = DB::select("
		    select 
			*
		    from
			tblGrpMembrs, tblUser
		    where
			tblGrpMembrs.UserID = tblUser.userID and
			tblGrpMembrs.ID = '$ID' and
			tblGrpMembrs.GroupID = '$GroupID'
		");


	    foreach($members as $member)
	    {
		$headerx = 'MIME-Version: 1.0' . "\r\n".'Content-type: text/html; charset=iso-8859-1' . "\r\n"."From: GroupMessage <noreply@groupmessage.com>"."\r\n";
		mail($member->email, $message_subject, $the_message, $headerx);

	    }
	
	    //INSERT DATA INTO DATABASE
	    DB::table('tblMessages')->insert(array(
		'ID' => $ID,
		'GroupID' => $GroupID,
		'MsgDateTime' => date("Y-m-d", time()),
		'Subject' => $message_subject,
		'Body' => $the_message,
		'Email' => '1'
	    ));

	    echo "success";
	}
		
    }
    
    public function postSendMessageDynamic()
    {
	$the_message = Input::get('the_message');
	$message_subject = Input::get('message_subject');
	
	$json_data = json_decode(Input::get('nitson'));
	$theArray = $json_data->kambiang;
	
	foreach($theArray as $thar)
	{
	    //if value = 1, send message
	    if($thar->value == 1)
	    {
		//send message to user related to idx
		//find ID and GroupID first
		$findx = DB::table('tblGroup')->where('idx','=',$thar->idx)->first();
		
		//ALL MEMBER OF CURRENT ID AND GROUPID
		$members = DB::select("
			select 
			    *
			from
			    tblGrpMembrs, tblUser
			where
			    tblGrpMembrs.UserID = tblUser.userID and
			    tblGrpMembrs.ID = '$findx->ID' and
			    tblGrpMembrs.GroupID = '$findx->GroupID'
		    ");
		
		foreach($members as $member)
		{
		    $headerx = 'MIME-Version: 1.0' . "\r\n".'Content-type: text/html; charset=iso-8859-1' . "\r\n"."From: GroupMessage - ".$findx->ID." <".$findx->ID."@groupmessage.co.uk>"."\r\n";
		    mail($member->email, $message_subject, $the_message, $headerx);

		}
		//INSERT DATA INTO DATABASE
		DB::table('tblMessages')->insert(array(
		    'ID' => $findx->ID,
		    'GroupID' => $findx->GroupID,
		    'MsgDateTime' => date("Y-m-d", time()),
		    'Subject' => $message_subject,
		    'Body' => $the_message,
		    'Email' => '1'
		));
	    }
	}
	echo "Email sent";
    }
 
    public function postJoinGroup()
    {
	//url post idx or group
	$group = DB::table('tblGroup')->where('idx','=',Input::get('group'))->first();
	$ID = $group->ID;
	$GroupID = $group->GroupID;
	$Group = $group->Group;
	
	$countUser = DB::table('tblGrpMembrs')
		->where('UserID','=',Auth::user()->userID)
		->where('ID','=',$ID)
		->where('GroupID','=',$GroupID)
		->count();
	
	if($countUser > 0)
	{
	    echo "You already member of \"".$group->Group."\" group";
	}
	else
	{
	    DB::table('tblGrpMembrs')->insert(array(
		'ID'=>$ID,
		'GroupID'=>$GroupID,
		'UserID'=>Auth::user()->userID,
		'Leader'=>0,
		'created_at'=>date("Y-m-d H:i:s", time())
	    ));
	    echo "You have join to \"".$group->Group."\" group";
	    
	    //
	    //* Find an Account
	    //
	    $whatAcc = DB::table('tblAccount')->where('ID','=',$ID)->first();
	    $accName = $whatAcc->AccName;
	    
	    //
	    //* Send message to user
	    //
	    //because of user is pasti login, we can catch by Auth::user()
	    $message_subject = "Thank you for joining the ".$Group." Group of the ".$accName." Account";
	    $the_message = "To be able to receive messages from this Group please click the link below to validate your email address. <br><a href='http://groupmessage.co.uk/register_join_validation?ID=".$ID."&GroupID=".$GroupID."&email=".Auth::user()->email."&utok=".Auth::user()->user_token."'>Click Here to validate email address</a>";
	    //$headerx = 'MIME-Version: 1.0' . "\r\n".'Content-type: text/html; charset=iso-8859-1' . "\r\n"."From: GroupMessage <noreply@groupmessage.co.uk>"."\r\n";
			$headerx.= "MIME-version: 1.0\n";
			$headerx.= "Content-type: text/html; charset= iso-8859-1\n";
			$headerx.= "From: GroupMessage <groupmessage@gmail.com>"."\r\n";
			$headerx .= "X-Priority: 1 (Highest)\n";
        	$headerx .= "X-MSMail-Priority: High\n";
         $headerx .= "Importance: High\n";
	    mail(Auth::user()->email, $message_subject, $the_message, $headerx);
	    
	    
	    //
	    //*Messages Confirmation
	    //
	    DB::table('tblMessages')->insert(array(
		'ID' => $ID,
		'GroupID' => $GroupID,
		'MsgDateTime' => date("Y-m-d H:i:s", time()),
		'Subject' => 'Validate Email / Join Group Confirmation',
		'Body' => 'Lorem Ipsum... Colin will explain for this message',
		'Email' => '1',
		'Special' => Auth::user()->userID
	    ));
	    
	}
    }
    
    public function postChangeUrl()
    {
	$group = DB::table('tblGroup')->where('idx','=',Input::get('group'))->first();
	$ID = $group->ID;
	$GroupID = $group->GroupID;
	?><input type="text" id="hiddenSelectID" value="<?php echo $ID; ?>">
	<input type="text" id="hiddenSelectGroupID" value="<?php echo $GroupID; ?>"><?php
    }
    
    public function postChangeUrlByTab2()
    {
	$group = DB::table('tblGroup')->where('idx','=',Input::get('group'))->first();
	$ID = $group->ID;
	$GroupID = $group->GroupID;
	?><input type="text" id="hiddenSelectID" value="<?php echo $ID; ?>">
	<input type="text" id="hiddenSelectGroupID" value="<?php echo $GroupID; ?>"><?php
    }
    
    public function postLeaveGroup()
    {
	
    }
    
    public function postCheckedBtnSelectAllGroups()
    {
	$ID = Input::get('ID');
	$GroupID = Input::get('GroupID');
	$TrueUserType = Input::get('TrueUserType');
    
	    ?>
	    <!-- row -->
	    <div class="row back-b mb-1">
		<div class="section-title">
		    Select All Groups
		</div>
		<div class="section-buttons">
		    <div class="section-pm">
			<div id="bod2-acc1-1-check">
			    <img src="/img/checked.png" onclick="uncheckedBtnSelectAllGroups('<?= $ID; ?>','<?= $GroupID; ?>','<?= $TrueUserType; ?>');">
			    <input type="text" id="selectAllGroupsValue" value="1" style="display:none;">
			</div>
		    </div>
		</div>
	    </div>
	    
	    <?php if($TrueUserType == "Admin"){ 
	    //GROUWING WHAT GROUP HE/SHE HAS WITH CURRENT ID
	    $groupCheckOnTab2 = DB::table('tblGroup')->where('ID','=',$ID)->orderBy('Group','asc')->get();
	    
		foreach($groupCheckOnTab2 as $gcotb2) 
		{
		    ?>
		    <!-- row -->
		    <div class="row back-b mb-1">
			<div class="section-title">
			    <?php echo $gcotb2->Group; ?>
			</div>
			<div class="section-buttons">
			    <div class="section-pm">
				<div id="bod2-acc1-3-check_<?= $gcotb2->idx; ?>">
				    <img src="/img/checked.png" onclick="uncheckedBtnSendMessageToCurrentGroupMembers('<?= $gcotb2->idx; ?>');">
				    <input type="text" id="currentGroupMembersValue_<?= $gcotb2->idx; ?>" value="1" style="display:none;">
				</div>
			    </div>
			</div>
		    </div>
		    <?php 
		}
	    } elseif ($TrueUserType == "Leader") { ?>
	    <!-- row -->
	    <div class="row back-b mb-1">
		<div class="section-title">
		    <?php echo $dataGroup->Group; ?>
		</div>
		<div class="section-buttons">
		    <div class="section-pm">
			<div id="bod2-acc1-3-check_<?= $gcotb2->idx; ?>">
			    <img src="/img/checked.png" onclick="uncheckedBtnSendMessageToCurrentGroupMembers('<?= $gcotb2->idx; ?>');">
			    <input type="text" id="currentGroupMembersValue_<?= $gcotb2->idx; ?>" value="1" style="display:none;">
			</div>
		    </div>
		</div>
	    </div>
	    <?php } 
    }
    
    
    public function postUncheckedBtnSelectAllGroups()
    {
	$ID = Input::get('ID');
	$GroupID = Input::get('GroupID');
	$TrueUserType = Input::get('TrueUserType');
    
	    ?>
	    <!-- row -->
	    <div class="row back-b mb-1">
		<div class="section-title">
		    Select All Groups
		</div>
		<div class="section-buttons">
		    <div class="section-pm">
			<div id="bod2-acc1-1-check">
			    <img src="/img/unchecked.png" onclick="checkedBtnSelectAllGroups('<?= $ID; ?>','<?= $GroupID; ?>','<?= $TrueUserType; ?>');">
			    <input type="text" id="selectAllGroupsValue" value="0" style="display:none;">
			</div>
		    </div>
		</div>
	    </div>
	    
	    <?php if($TrueUserType == "Admin"){ 
	    //GROUWING WHAT GROUP HE/SHE HAS WITH CURRENT ID
	    $groupCheckOnTab2 = DB::table('tblGroup')->where('ID','=',$ID)->orderBy('Group','asc')->get();
	    
		foreach($groupCheckOnTab2 as $gcotb2) 
		{
		    ?>
		    <!-- row -->
		    <div class="row back-b mb-1">
			<div class="section-title">
			    <?php echo $gcotb2->Group; ?>
			</div>
			<div class="section-buttons">
			    <div class="section-pm">
				<div id="bod2-acc1-3-check_<?= $gcotb2->idx; ?>">
				    <img src="/img/unchecked.png" onclick="checkedBtnSendMessageToCurrentGroupMembers('<?= $gcotb2->idx; ?>');">
				    <input type="text" id="currentGroupMembersValue_<?= $gcotb2->idx; ?>" value="0" style="display:none;">
				</div>
			    </div>
			</div>
		    </div>
		    <?php 
		}
	    } elseif ($TrueUserType == "Leader") { ?>
	    <!-- row -->
	    <div class="row back-b mb-1">
		<div class="section-title">
		    <?php echo $dataGroup->Group; ?>
		</div>
		<div class="section-buttons">
		    <div class="section-pm">
			<div id="bod2-acc1-3-check_<?= $gcotb2->idx; ?>">
			    <img src="/img/unchecked.png" onclick="checkedBtnSendMessageToCurrentGroupMembers('<?= $gcotb2->idx; ?>');">
			    <input type="text" id="currentGroupMembersValue_<?= $gcotb2->idx; ?>" value="0" style="display:none;">
			</div>
		    </div>
		</div>
	    </div>
	    <?php } 
    }
    
    
    public function getSendMailCronXX()
    {
	//
	// * Sending an email to the user
	//
	$sendxxs = DB::table('tblEmailQueue')
		->where('SendingTime','=',date("Y-m-d H:i:s"))
		->get();
	
	foreach($sendxxs as $sendxx)
	{
	    $message_subject = $sendxx->Subject;
	    $the_message = $sendxx->Body;
	    $headerx = 'MIME-Version: 1.0' . "\r\n".'Content-type: text/html; charset=iso-8859-1' . "\r\n"."From: GroupMessage <noreply@groupmessage.co.uk>"."\r\n";
	    mail($sendxx->email, $message_subject, $the_message, $headerx);
	    
	    DB::table('tblEmailQueue')->where('idx','=',$sendxx->idx)->update(array(
		'Success' => '1'
	    ));
	}
    }
    
    public function getSendMailCron()
    {
	//
	// * Sending an email to the user
	//
	$sendxxs = DB::table('tblEmailQueue')
		->where('SendingTime','=',date("Y-m-d H:i:s"))
		->get();
	
	foreach($sendxxs as $sendxx)
	{
	    $message_subject = $sendxx->Subject;
	    $the_message = $sendxx->Body;
	    $headerx = 'MIME-Version: 1.0' . "\r\n".'Content-type: text/html; charset=iso-8859-1' . "\r\n"."From: GroupMessage <noreply@groupmessage.co.uk>"."\r\n";
	    mail($sendxx->email, $message_subject, $the_message, $headerx);
	    
	    DB::table('tblEmailQueue')->where('idx','=',$sendxx->idx)->update(array(
		'Success' => '1'
	    ));
	}
    }
    
    
    public function getServerTime()
    {
	echo date("Y-m-d H:i:s")."<br>";
	
	//add 1day 4hour 3min 0s
	
	$date = new DateTime();
	$date->add(new DateInterval('P20DT4H3M'));
	echo $date->format('Y-m-d H:i:s');
	
	echo "<br>";
	
	$datea = new DateTime();
	$datea->add(new DateInterval('P0DT4H3M1S'));
	echo $datea->format('Y-m-d H:i:s');
	
    }
    
}