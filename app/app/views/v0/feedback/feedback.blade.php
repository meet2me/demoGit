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
    <!-- fee_1 section -->
    <div id="fee_1">
	<div id="fee_1_head">
	    <div class="row" style="background-color: #ff8838; border-bottom: 1px solid #888;">
		<div style="color: #FFFFFF; display: table; float: left; font-size: 1.4em; margin: 10px 15px;">
		    Item 1
		</div>
		<div id="fee_1_btn" style="display: table; float: right; margin: 5px 15px;">
		    <img src="/img/minus.png" onclick="closeBodyABC('fee_1');">
		</div>
	    </div>
	</div>
	<div id="fee_1_body" class="">
	    <div class="row" style="background-color: #fea468; border-bottom: 1px solid #888; padding: 15px;">
		content
	    </div>
	</div>
    </div>
    <!-- /fee_1 section -->
    
    <!-- fee_2 section -->
    <div id="fee_2">
	<div id="fee_2_head">
	    <div class="row" style="background-color: #ff8838; border-bottom: 1px solid #888;">
		<div style="color: #FFFFFF; display: table; float: left; font-size: 1.4em; margin: 10px 15px;">
		    Item 2
		</div>
		<div id="fee_2_btn" style="display: table; float: right; margin: 5px 15px;">
		    <img src="/img/plus.png" onclick="openBodyABC('fee_2');">
		</div>
	    </div>
	</div>
	<div id="fee_2_body" style="display: none;">
	    <div class="row" style="background-color: #fea468; border-bottom: 1px solid #888; padding: 15px;">
		content
	    </div>
	</div>
    </div>
    <!-- /fee_2 section -->
    
    <!-- fee_3 section -->
    <div id="fee_3">
	<div id="fee_3_head">
	    <div class="row" style="background-color: #ff8838; border-bottom: 1px solid #888;">
		<div style="color: #FFFFFF; display: table; float: left; font-size: 1.4em; margin: 10px 15px;">
		    Item 3
		</div>
		<div id="fee_3_btn" style="display: table; float: right; margin: 5px 15px;">
		    <img src="/img/plus.png" onclick="openBodyABC('fee_3');">
		</div>
	    </div>
	</div>
	<div id="fee_3_body" style="display: none;">
	    <div class="row" style="background-color: #fea468; border-bottom: 1px solid #888; padding: 15px;">
		content
	    </div>
	</div>
    </div>
    <!-- /fee_3 section -->
    
</div>    
</body>
</html>
