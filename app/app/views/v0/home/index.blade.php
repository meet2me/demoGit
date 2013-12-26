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
<body onload="hideAccGrp();"> 
<div id="mobile-page">
    <div id="top-bar">
	<center>
	    <a href="/" class="links white-font">Home</a>
	</center>
    </div>
    <div style="height: 50px;"></div>
    <div class="row">
	<div style="height: 50px; margin: 15px; background-color: blue;">
	    
	</div>
    </div>
    
    <hr>
    <div class="row">
	<div class="pad15">
	    <center><h2>BANNER</h2></center>
	</div>
    </div>
    <!-- TAB A -->
    <div>
	<div id="tab-head-group" class="row">
	    <div id="tab-head-1" class="aktif tab-head fixed-box" onclick="showTabA(1);">
		FAQ
	    </div>
	    <div id="tab-head-2" class="tab-head fixed-box" onclick="showTabA(2);">
		Join Demo Testgroup
	    </div>
	    <div id="tab-head-3" class="tab-head fixed-box" onclick="showTabA(3);">
		Feedback
	    </div>
	    <div id="tab-head-4" class="tab-head fixed-box" onclick="showTabA(4);">
		More
	    </div>
	</div>
	<div id="tab-body-group">
	    <div class="row">
		<div class="pad15 back-a" style="color: white;">
		    <center><iframe width="284" height="160" src="//www.youtube.com/embed/i5gQvwEfLh8" frameborder="0" allowfullscreen></iframe></center>
		</div>
	    </div>
	</div>
    </div>
    <!-- /TAB A -->
    <div class="row">
	<div class="pad15">
	    <center><h3>Lorem Ipsum Sit Amet</h3></center>
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
    <div class="row">
	<div class="pad15">
	    <center>
		Privacy Policy Terms Disclaimer Link Policy
	    </center>
	</div>
    </div>
    <div id="footer" style="background-color: #fff; color: #000;">
	&copy;2013 GroupMessage for Non Profit
    </div>
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
