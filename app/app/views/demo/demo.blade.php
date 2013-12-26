<!DOCTYPE html> 
<html> 
<head> 
    <title>Group Message</title> 
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="/css/style.css" />
    <script src="/js/jquery-2.0.3.min.js"></script>
    <script src="/js/thejs.js"></script>
</head> 
<body onload="activeFirst();"> 
<div id="mobile-page">
    <div id="top-bar">
	<div>
	    <a href="/" class="links white-font">Home</a> | 
	    @foreach($resInf as $resX)
	    {{ $resX->AccName }} 
	    @endforeach
	    | Logout
	</div>
    </div>
    <div id="logo-text" class="fixed-box">
	<div id="logo">
	    Temp Logo
	</div>
	
	<style>
	.brow { color: #000; height: 20px; }    
	</style>
	@foreach($resInf as $resX)
	<div id="text-x">
	    <div class="brow">Account ID: {{ $resX->GroupID }}</div>
	    <div class="brow">Group: {{ $resX->Group }}</div>
	    <div class="brow">Group ID: {{ $resX->GroupID }}</div>
	    <div class="brow">Admin Tel. {{ $resX->AdminTel }}</div>
	    <div class="brow">Admin Email:</div>
	    <div class="brow"><a href="mailto:{{ $resX->AdminEmail }}" class="links black-font">{{ $resX->AdminEmail }}</a></div>
	</div>
	@endforeach
	
	<!--
	<div style="color: white; float: right; font-size: 1.2em; margin-right: 15px; padding: 5px;" class="back-a">
	    G<br>R<br>O<br>U<br>P
	</div>
	-->
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
	<div id="tab-body-group">
	    @include('demo.body1')
	    @include('demo.body2')
	    @include('demo.body3')
	</div>
    </div>
    <div id="footer" style="background-color: #fff; color: #000;">
	&copy;2013 GroupMessage for Non Profit
    </div>
    
    
    <!-- modal for changing group -->
    <div id="mod_ch_grp">
	testing
    </div>
    <!-- modal for changing group -->
    
</div>
</body>
</html>
