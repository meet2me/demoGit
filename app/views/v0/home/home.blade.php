<!DOCTYPE html> 
<html> 
<head> 
    <title>Group Message</title> 
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 
    <link rel="stylesheet" href="/css/style.css" />
    <script src="/js/jquery-2.0.3.min.js"></script>
</head> 
<body onload="hideAccGrp();"> 
<div id="mobile-page">
    <div id="top-bar">
	<center>
	    <a href="/account" class="links white-font">Account</a> | 
	    <a href="/group" class="links white-font">Group</a> | 
	    <a href="/register" class="links white-font">Register</a> | 
	    <a href="/logout" class="links white-font">Logout</a>
	</center>
    </div>
    <div style="height: 50px;"></div>
    <div class="row">
	<div style="height: 130px; margin: 15px;">
	    <div style="float: left; height: 100px; background-color: blue; margin-right: 10px; width: 100px; ">
	    </div>
	    <div style="border: 1px solid #888; float: left; height: 100px; width: 170px;">
		<div style="padding: 5px;" class="white-font">
		    Plain text goes here.
		</div>
	    </div>
	</div>
    </div>
    
    
    <!-- TAB A -->
    
    <style> /* OVERRIDE THE STYLE */
    .aktif {
	background-color: #ff8838;
	color: #fff;
    }
    </style>
    
    <div>
	<div id="tab-head-group" class="row">
	    <div id="tab-head-1" class="aktif tab-head fixed-box white-font" onclick="showTabA(1);">
		FAQ
	    </div>
	    <div id="tab-head-2" class="tab-head fixed-box white-font" onclick="showTabA(2);">
		Join Demo Testgroup
	    </div>
	    <div id="tab-head-3" class="tab-head fixed-box white-font" onclick="showTabA(3);">
		Feedback
	    </div>
	    <div id="tab-head-4" class="tab-head fixed-box white-font" onclick="showTabA(4);">
		More
	    </div>
	</div>
	<div id="tab-body-group">
	    <!-- tab 1 -->
	    <div id="body-1" class="row">
		<div style="background-color: #ff8838; padding: 15px;">
		    <span style="color: #fff; font-size: 1.3em;">Tab 1</span>
		</div>
	    </div>
	    <!-- /tab 1 -->
	    
	    <!-- tab 2 -->
	    <div id="body-2" class="row" style="display: none;">
		<div style="background-color: #ff8838; padding: 15px;">
		    <span style="color: #fff; font-size: 1.3em;">Tab 2</span>
		</div>
	    </div>
	    <!-- /tab 2 -->
	    
	    <!-- tab 3 -->
	    <div id="body-3" class="row" style="display: none;">
		<div style="background-color: #ff8838; padding: 15px;">
		    <span style="color: #fff; font-size: 1.3em;">Tab 3</span>
		</div>
	    </div>
	    <!-- /tab 3 -->
	    
	    <!-- tab 4 -->
	    <div id="body-4" class="row" style="display: none;">
		<div style="background-color: #ff8838; padding: 15px;">
		    <span style="color: #fff; font-size: 1.3em;">Tab 4</span>
		</div>
	    </div>
	    <!-- /tab 4 -->
	</div>
    </div>
    <!-- /TAB A -->
    <div class="row">
	<div class="pad15">
	    <center><h3 class="white-font">Lorem Ipsum Sit Amet</h3></center>
	</div>
    </div>
    <!-- ICON ROW -->
    <style>
	.index-icons {
	    background-color: black; 
	    border-radius: 5px;
	    color: white; 
	    display: table; 
	    float: left;
	    height: 50px;
	    margin-right: 10px;
	    width: 50px;
	}
    </style>
    <div class="row">
	<div class="pl-15">
	    <div class="index-icons">
		<img src="/img/icon1.jpg">
	    </div>
	    <div class="index-icons">
		<img src="/img/icon2.jpg">
	    </div>
	    <div class="index-icons">
		<img src="/img/icon3.jpg">
	    </div>
	    <div class="index-icons">
		<img src="/img/icon4.jpg">
	    </div>
	    <div class="index-icons">
		<img src="/img/icon5.jpg">
	    </div>
	</div>
    </div>
    <!-- /ICON ROW -->
    @include('v0.templates.footer_link')
    @include('v0.templates.footer')
</div>
<script>
function hideBodyRemoveHeadA() 
{
    $('#tab-head-1').removeClass("aktif");
    $('#tab-head-2').removeClass("aktif");
    $('#tab-head-3').removeClass("aktif");
    $('#tab-head-4').removeClass("aktif");
    $('#body-1').hide();
    $('#body-2').hide();
    $('#body-3').hide();
    $('#body-4').hide();
}
function showTabA(id)
{
    hideBodyRemoveHeadA();
    $('#tab-head-'+id).addClass("aktif");
    $('#body-'+id).fadeIn();
}

	
function hideAccGrp()
{
    $("#row_new_acc").hide();
    $("#row_new_grp").hide();
}

function accountChange()
{
    var account = document.getElementById('el_select_account').value;
    if(account === 'new_account')
    {
	$("#row_new_acc").show();
    }
    else if(account === 'blank')
    {
	//doing nothing
    }
    else 
    {
	$("#row_new_acc").hide();
    }

}

function groupChange() 
{
    var group = document.getElementById('el_select_group').value;
    if(group === 'new_group')
    {
	$("#row_new_grp").show();
    }
    else if(group === 'blank')
    {
	//doing nothing
    }
    else
    {
	$("#row_new_grp").hide();
	window.location.href = group;
    }
}

</script>
</body>
</html>
