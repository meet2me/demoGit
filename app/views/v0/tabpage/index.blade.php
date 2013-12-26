<!DOCTYPE html> 
<html> 
<head> 
    <title>Group Message - V.0</title> 
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <link rel="stylesheet" href="/css/style.css" />
    <script src="/js/jquery-2.0.3.min.js"></script>
    <script src="/js/v0_thejs.js"></script>
    <script src="/js/AdminMessage.js"></script>
</head> 
<body onload="activeFirst();"> 
<div id="mobile-page">
    <div id="top-bar">
	<center>
	    <a href="/" class="links white-font">Home</a> | 
	    <a href="/logout?ID={{ $ID }}&GroupID={{ $GroupID }}" style="text-decoration: none; color: #fff;">Logout</a>
	</center>
    </div>
    <div id="logo-text" class="fixed-box">
	<div id="logo">
	    Temp Logo
	</div>
	
	<style>
	.brow { color: #fff; height: 20px; }    
	</style>
	<div id="text-x">
	    <div class="brow">Account ID: {{ $resInf->AccID }}</div>
	    <div class="brow">Admin Tel. {{ $resInf->AdminTel }}</div>
	    <div class="brow">Admin Email:</div>
	    <div class="brow"><a href="mailto:{{ $resInf->AdminEmail }}" class="links white-font">{{ $resInf->AdminEmail }}</a></div>
	</div>
    </div>
    <div id="tabbed">
	<div id="tab-head-group">
	    <a href="#p1" id="tab-head-1" class="tab-head fixed-box white-font" onclick="showTab(1);">
		Join/Leave Group
	    </a>
	    <a href="#p2" id="tab-head-2" class="tab-head fixed-box white-font" onclick="showTab(2);">
		Messages
	    </a>
	    <a href="#p3" id="tab-head-3" class="tab-head fixed-box white-font" onclick="showTab(3);">
		Group Admin
	    </a>
	    <a href="#p4" id="tab-head-4" class="tab-head fixed-box white-font" onclick="showTab(4);">
		Help
	    </a>
	</div>
	<div id="tab-body-group">
	    @include('v0.tabpage.body1')
	    @include('v0.tabpage.body2')
	    @include('v0.tabpage.body3')
	    @include('v0.tabpage.body4')
	</div>
    </div>
    @include('v0.templates.footer')
</div>

</body>
</html>
