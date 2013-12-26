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
</head> 
<body> 
<div id="mobile-page">
    <div id="top-bar">
	<center>
	    <a href="/" class="white-font">Home</a> | 
	    <a href="/group" class="white-font">Groups</a> | 
	    <a href="/logout" class="white-font">Logout</a> 
	</center>
    </div>
    <div style="margin-top: 40px;"></div>
    <!-- reg_acc section -->
    <div id="reg_acc">
	<div id="reg_acc_head">
	    <div class="row" style="background-color: #ff8838; border-bottom: 1px solid #888;">
		<div style="color: #FFFFFF; display: table; float: left; font-size: 1.4em; margin: 10px 15px;">
		    Accounts
		</div>
		<div id="reg_acc_btn" style="display: table; float: right; margin: 5px 15px;">
		    <img src="/img/minus.png" onclick="closeBodyABC('reg_acc');">
		</div>
	    </div>
	</div>
	<div id="reg_acc_body" class="">
	    <div class="row" style="background-color: #fea468; border-bottom: 1px solid #888; padding: 15px;">
		Testing
	    </div>
	</div>
    </div>
    <!-- /reg_acc section -->
    
    <!-- reg_grp section -->
    <div id="reg_grp">
	<div id="reg_grp_head">
	    <div class="row" style="background-color: #ff8838; border-bottom: 1px solid #888;">
		<div style="color: #FFFFFF; display: table; float: left; font-size: 1.4em; margin: 10px 15px;">
		    Groups
		</div>
		<div id="reg_grp_btn" style="display: table; float: right; margin: 5px 15px;">
		    <img src="/img/plus.png" onclick="openBodyABC('reg_grp');">
		</div>
	    </div>
	</div>
	<div id="reg_grp_body" style="display: none;">
	    <div class="row" style="background-color: #fea468; border-bottom: 1px solid #888; padding: 15px;">
		Testing
	    </div>
	</div>
    </div>
    <!-- /reg_grp section -->
    
    <!-- reg_reg section -->
    <div id="reg_reg">
	<div id="reg_reg_head">
	    <div class="row" style="background-color: #ff8838; border-bottom: 1px solid #888;">
		<div style="color: #FFFFFF; display: table; float: left; font-size: 1.4em; margin: 10px 15px;">
		    Register
		</div>
		<div id="reg_reg_btn" style="display: table; float: right; margin: 5px 15px;">
		    <img src="/img/plus.png" onclick="openBodyABC('reg_reg');">
		</div>
	    </div>
	</div>
	<div id="reg_reg_body" style="display: none;">
	    <div class="row" style="background-color: #fea468; border-bottom: 1px solid #888; padding: 15px;">
		Testing
	    </div>
	</div>
    </div>
    <!-- /reg_reg section -->    
</div>
    
</body>
</html>