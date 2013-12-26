<!DOCTYPE html> 
<html> 
<head> 
    <title>Group Message</title> 
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 
    <link rel="stylesheet" href="/css/style.css" />
    <script src="/js/jquery-2.0.3.min.js"></script>
    <script src="/js/v0_thejs.js"></script>
</head> 
<body> 
<div id="mobile-page">
    <div id="top-bar">
	<center>
	    <a href="/about" style="color: #fff;">About</a> | 
	    <a href="/home" style="color: #fff;">Home</a> | 
	    <a href="/logout" style="color: #fff;">Logout</a>
	</center>
    </div>
    <div style="height: 40px;"></div>
    <div class="row">
	<div style="height: 75px; margin: 15px; background-color: blue;">
	    
	</div>
    </div>
    
    <div class="row" style="background-color: #ff8838; border-bottom: 1px solid #888;">
	 <div>
	<center>Ignore the temporary video 
	</br> 'She has too much time on her hands' :-)</center>
    </div>
	<div class="pad15" style="color: white;">
	    <center><iframe width="284" height="160" src="//www.youtube.com/embed/i5gQvwEfLh8" frameborder="0" allowfullscreen></iframe></center>
	</div>
    </div>
    <div>
	@include('v0.index.dd_section')
    </div>
    
    
    @include('v0.templates.footer_link')
    @include('v0.templates.footer')
</div>
</body>
</html>
