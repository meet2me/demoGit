<!DOCTYPE html> 
<html> 
<head> 
    <title>Group Message</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="/css/style.css" />
    
    <script src="/js/jquery-2.0.3.min.js"></script>
</head> 
<body> 

<div id="mobile-page">
    <div id="top-bar">
	<div class="row">
	    <center>Home | <a href="register.php">Register</a>| <a href="login.php">Login</a> | Logout</center>
	</div>
    </div>
    <div style="margin-top: 50px;"></div>
    <!-- section one -->
    <div id="int1">
	<div id="int1-head" class="back-b">
	    <div class="row">
		<div class="head-pm">
		    <div id="int1-pm">
			<img src="plus.png" onclick="accordHide('int1-body','int1-pm');">
		    </div>
		</div>
	    </div>
	</div>
	<div id="int1-body">
	    <div class="row" style="height: 150px; background-color: orange;">
		Intro 1
	    </div>
	</div>
    </div>
    <!-- /section one -->
    
    <!-- section two -->
    <div id="int2">
	<div id="int2-head" class="back-b">
	    <div class="row">
		<div class="head-pm">
		    <div id="int2-pm">
			<img src="plus.png" onclick="accordHide('int2-body','int2-pm');">
		    </div>
		</div>
	    </div>
	</div>
	<div id="int2-body">
	    <div class="row" style="height: 150px; background-color: orange;">
		Intro 2
	    </div>
	</div>
    </div>
    <!-- /section two -->
</div>

<script type="text/javascript" src="thejs.js"></script>    
</body>
</html>
