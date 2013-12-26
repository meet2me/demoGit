<!DOCTYPE html> 
<html> 
<head> 
    <title>Group Message</title> 
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="/css/style.css" />
    <script src="/js/jquery-2.0.3.min.js"></script>
    <script src="/js/v0_thejs.js"></script>
    <script>
	function confirmOrValidate()
	{
	    var theURL = document.URL;
	    var explode = theURL.split('#');

	    if(explode[1] === 'confirm')
	    {
		$('#NewUserConfirm').removeClass("my_hide");
	    }

	    if(explode[1] === 'validate')
	    {
		$('#NewUserValidate').removeClass("my_hide");
	    }
	}
    </script>
</head> 
<body onload="confirmOrValidate();"> 
<div id="mobile-page">
    <div id="top-bar">
	<center>
	    <a href="/" class="white-font">Home</a> | 
	    <a href="/group" class="white-font">Groups</a> | 
	    <a href="/logout" class="white-font">Logout</a> 
	</center>
    </div>
    <div style="margin-top: 40px;"></div>
    
    <!-- NewUserConfirm -->
    <div id="NewUserConfirm" class="my_hide">
	<div class="row" style="background-color: #fea468;">
	    <div style="padding: 15px; font-size: 1.3em;">
		To receive messages from this group you must validate your email address, please check your email account in a few minutes and click the link in the email.
		<p><B>IMPORTANT</B></P>
		<p>If you do not receive the email within 10 minutes please check your spam folder.</p>
		<p>If you are sure you did not receive a confirmation email please return to the page that you signed up at. At the top of the page you will find the admin email address for the group. Send an email and we will manually validate you on the system</p>
		<p><B>Please also do the following after you receive the SECOND email from this group (not the validation email)</B><br>
		To ensure that all emails go to your Primary Inbox please add the email address from your second group email to your address book</p>
		<div style="margin-top: 10px;">
		    <a href="/register_join_validation?ID=<?= Input::get('ID'); ?>&GroupID=<?= Input::get('GroupID'); ?>&email=<?= Input::get('email'); ?>&utok=<?= Input::get('utok'); ?>">
			<div style="color: #fff; padding: 5px 10px; text-align: center; width: 60px;" class="back-c">Close</div>
		    </a>
		</div>
	    </div>
	</div>
    </div>
    <!-- /NewUserConfirm -->
    
    <!-- NewUserValidate -->
    <div id="NewUserValidate" class="my_hide">
	<div class="row" style="background-color: #fea468;">
	    <div style="padding: 15px; font-size: 1.3em;">
		Thank you for confirming your email address.<br><br> Group leaders will send message by email or SMS.<br><br> 
		Click <a href="/register_join_validation?ID=<?= Input::get('ID'); ?>&GroupID=<?= Input::get('GroupID'); ?>&email=<?= Input::get('email'); ?>&utok=<?= Input::get('utok'); ?>">here</a> to go to the messages tab on the <?= $dataGroup->Group; ?> page. In this tab you can see the last 10 messages sent to the group.<br><br> If you are an account Admin or Group Leader you can also send messages to the group from this Page & Tab
		<div style="margin-top: 10px;">
		    <a href="/register_join_validation?ID=<?= Input::get('ID'); ?>&GroupID=<?= Input::get('GroupID'); ?>&email=<?= Input::get('email'); ?>&utok=<?= Input::get('utok'); ?>">
			<div style="color: #fff; padding: 5px 10px; text-align: center; width: 60px;" class="back-c">Close</div>
		    </a>
		</div>
	    </div>
	</div>
    </div>
    <!-- /NewUserValidate -->
    
</div> 

</body>
</html>
