<?php

/*
 * 
| Ip: 198.144.190.11 (n)
| UserName: grpmesuk
| PassWord: develop66a
| Contact Email: grpmesuk@kinsella.me
 * 
 */

/* VIEW FOR USER
select 
tblGrpMembrs.UserID,
tblGrpMembrs.ID,
tblGrpMembrs.GroupID,
tblGrpMembrs.Leader
from 
tblGrpMembrs inner join tblAdmin 
on tblGrpMembrs.UserID = tblAdmin.UserID
 * 
 */


/*
select 
    tblGrpMembrs.UserID,
    tblGrpMembrs.ID,
    tblGrpMembrs.GroupID,
	tblGrpMembrs.Leader,
	tblGrpMembrs.Admin,
    tblUser.firstname,
    tblUser.lastname,
    tblUser.email
from 
    tblGrpMembrs, tblUser 
where 
    tblGrpMembrs.UserID = tblUser.userID
 * 
 */
 

/*	
select
tblUser.userID as UserID,
tblGrpMembrs.ID,
tblGrpMembrs.GroupID,
tblUser.firstname,
tblUser.lastname,
tblGrpMembrs.Leader,
(
    select tblAdmin.UserID from tblAdmin where tblAdmin.UserID = tblGrpMembrs.UserID limit 0,1
) as Admin
from 
tblGrpMembrs, tblUser
where
tblUser.userID = tblGrpMembrs.UserID
 * 
 */

/* BEST QUERY (v_group_membrs_information)
select 
tblGrpMembrs.xxid,
tblUser.userID,
tblUser.firstname,
tblUser.lastname,
tblUser.email,
tblUser.phone,
tblGrpMembrs.ID,
tblGrpMembrs.GroupID,
tblGrpMembrs.Leader,
tblAdmin.UserID as Admin,
tblGrpMembrs.created_at
from 
tblGrpMembrs left join tblAdmin on (tblGrpMembrs.UserID = tblAdmin.UserID and tblGrpMembrs.ID = tblAdmin.ID)
join tblUser on (tblUser.userID = tblGrpMembrs.UserID)
*/


/*
Route::get('/', function()
{
	return View::make('index');
});
 * 
 */

/*
Route::get('/',function(){
    return View::make('what.index');
});
 * 
 */




Route::get('cookieset', function()
{
    //$foreverCookie = Cookie::forever('theName', 'theValue');
    //$tempCookie = Cookie::make('temporary', 'Victory', 5);
    //return Response::make()->withCookie($foreverCookie)->withCookie($tempCookie);
    $foreverCookie = Cookie::forever('theName', 'theValue');
    return Response::make()->withCookie($foreverCookie);
});


Route::get('cookietest', function()
{
    $showCookieValue = Cookie::get('theName');
    echo $showCookieValue;
    echo "aaa";
    
     //$forever = Cookie::get('forever');
     //$temporary = Cookie::get('temporary');
     //return View::make('cookietest', array('forever' => $forever, 'temporary' => $temporary, 'variableTest' => 'works'));
});



//Route::get('/','TheGroup@getHome');


Route::get('masukpass',function(){
    DB::table('tblUser')->where('userID','=','bbbb0021')->update(array(
	'password'=>Hash::make('1234')
    ));
});


//VERSION 0
Route::get('/','VoOne@getIndex');

Route::get('home','VoOne@getHome');

Route::get('login','VoOne@getLogin');
Route::post('login','VoOne@postLogin');

Route::get('logout','VoOne@getLogout');

Route::get('about','VoOne@getAbout');

Route::get('feedback','VoOne@getFeedback');

Route::get('register','VoOne@getRegister');

Route::post('register','VoOne@postRegister'); //INI ADA FUNGSI SENDIRI

Route::get('confirm','VoOne@getConfirm');


Route::get('register_join_validation','VoOne@getRegisterJoinValidation'); //this link come from email user everytime he/she join or register

Route::post('join_group','VoOne@postJoinGroup');

Route::post('leave_group','VoOne@postLeaveGroup');

Route::post('change_url','VoOne@postChangeUrl');

Route::post('change_url_by_tab2','VoOne@postChangeUrlByTab2');

Route::post('checked_admin','VoOne@postCheckedAdmin');
Route::post('unchecked_admin','VoOne@postUnCheckedAdmin');

Route::post('checked_leader','VoOne@postCheckedLeader');
Route::post('unchecked_leader','VoOne@postUnCheckedLeader');


Route::post('checkedBtnSelectAllGroups','VoOne@postCheckedBtnSelectAllGroups');
Route::post('uncheckedBtnSelectAllGroups','VoOne@postUncheckedBtnSelectAllGroups');

Route::post('sendmessage','VoOne@postSendMessage');

Route::post('test_send_message_dynamic',function(){
    //echo Input::get('nitson');
    
    $json_data = json_decode(Input::get('nitson'));
    
    $theArray = $json_data->kambiang;
    echo $theArray[0]->idx;
    
});

Route::post('send_message_dynamic','VoOne@postSendMessageDynamic');

Route::get('send_mail_cron','VoOne@getSendMailCron');

Route::get('server_time','VoOne@getServerTime');

Route::post('edit_admin_welcome_message','VoAdmMsg@postEditAdminWelcomeMessage');

Route::post('saving_admin_welcome_message','VoAdmMsg@postSavingAdminWelcomeMessage');

Route::get('{ID}/{GroupID}','VoOne@getTabPage');








Route::get('whatthis',function(){
    return View::make('what.index');
});

Route::post('x/join_do','TheGroup@postJoinDo');

//Route::get('{group}','TheGroup@getGroup');



//ADMIN PANEL
Route::get('adm','AdmAccount@getIndex');
Route::get('adm/login','XAdm@getLogin');
//Route::post('adm/dologin','XAdm@postLoginDo');
Route::get('adm/dologin','XAdm@getLoginDo');
Route::get('adm/dashboard','XAdm@getDashboard');
Route::get('adm/group','XAdm@getGroup');
Route::get('adm/group/add','XAdm@getGroupAdd');
Route::post('adm/group/add','XAdm@postGroupAdd');
Route::get('adm/group/edit','XAdm@getGroupEdit');
Route::post('adm/group/edit','XAdm@postGroupEdit');

Route::get('adm/account','AdmAccount@getAccount');
Route::get('adm/account/add','AdmAccount@getAccountAdd');
Route::post('adm/account/add','AdmAccount@postAccountAdd');
Route::get('adm/account/edit','AdmAccount@getAccountEdit');
Route::post('adm/account/edit','AdmAccount@postAccountEdit');
Route::get('adm/account/delete','AdmAccount@getAccountDelete');
