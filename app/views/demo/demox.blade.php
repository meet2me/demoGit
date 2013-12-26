<!DOCTYPE html> 
<html> 
<head> 
    <title>Group Message</title> 
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="/css/style.css" />
    
    <script src="jquery-2.0.3.min.js"></script>
</head> 
<body onload="activeFirst();"> 

<div id="mobile-page">
    <div id="top-bar">
	<div>
	    Home | <a href="login.php">Login</a> | Logout {{ $gogo }}
	</div>
    </div>
    <div id="logo-text" class="fixed-box">
	<div id="logo">
	    Logo Text
	</div>
	<div id="text-x" style="color: #000;">
	    My Favourite Club: {{-- $resultInf->AccName --}}<br>
	    Account ID: ????<br>
	    Group Junior Members: ???<br>
	    Group ID: <?php //$resultInf->GroupName; ?><br>
	    Admin Tel. <?php //$resultInf->AdminTel; ?><br>
	    Admin Email: <?php //$resultInf->AdminEmail; ?><br>
	    <a href="mailto:admin-favclub003@groupmessagenp.com" class="links">admin-favclub003@groupmessagenp.com</a><br>
	</div>
    </div>
    <div id="tabbed">
	<div id="tab-head-group">
	    <div id="tab-head-1" class="tab-head fixed-box" onclick="showTab(1);">
		Join/Leave Group
	    </div>
	    
	    <div id="tab-head-2" class="tab-head fixed-box" onclick="showTab(2);">
		Messages
	    </div>
	    
	    <div id="tab-head-3" class="tab-head fixed-box" onclick="showTab(3);">
		Group Admin
	    </div>
	    
	    <div id="tab-head-4" class="tab-head fixed-box" onclick="showTab(4);">
		Help
	    </div>
	    
	</div>
	
    </div>
    <div id="footer">
	&copy;2013 GroupMessage for Non Profit
    </div>
</div>
</body>
</html>
