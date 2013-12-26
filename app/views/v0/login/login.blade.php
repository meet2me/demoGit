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
	<div>
	    About | Account | Group | Register | Logout
	</div>
    </div>
    
    
    <!-- {{ Form::open(array('url' => '/v1/login')) }} -->
	@if (Session::has('login_errors'))
	    <span class="error alert">Wrong email or password</span>
	@endif
	<div class="row" style="margin-top: 50px;">
	    <div class="pl-15 pr-15">
		<input type="email" name="email" id="email" placeholder="Email Address" style="border: 1px solid #888; width: 100%;" />
	    </div>
	</div>

	<div class="row">
	    <div class="pl-15 pr-15">
		<input type="password" name="password" id="password" placeholder="Password (Leave blank if you do not have a password)" style="border: 1px solid #888; width: 100%;" />
	    </div>
	</div>
	
	<!-- account -->
	<div class="row" style="margin-top: 10px;">
	    <div class="pl-15 pr-15">
		<select id="el_select_account" style="width: 100%;">
		    <option value="blank">[ Select an Account ]</option>
		    <!-- <option value="new_account">[ New Account ]</option> -->
		    @foreach($accounts as $account)
		    <option value="{{ $account->ID }}">{{ $account->AccName }}</option>
		    @endforeach
		</select>
	    </div>
	</div>
	<div class="row" id="row_new_acc">
	    <div class="pl-15 pr-15">
		<input id="new_account" name="new_account" style="width: 100%; border: 1px solid #888;">
	    </div>
	</div>
	<!-- /account -->
	
	<!-- group -->
	<div class="row">
	    <div class="pl-15 pr-15">
		<select id="el_select_group" style="width: 100%;">
		    <option value="blank">[ Select a Group ]</option>
		    <!-- <option value="new_group">[ New Group ]</option> -->
		    @foreach($groups as $group)
		    <option value="{{ $group->GroupID }}">{{ $group->Group }}</option>
		    @endforeach
		</select>
	    </div>
	</div>
	<div class="row" id="row_new_grp">
	    <div class="pl-15 pr-15">
		<input id="new_group" name="new_group" style="width: 100%; border: 1px solid #888;">
	    </div>
	</div>
	<!-- /group -->

	<div class="row">
	    <div class="pl-15 pr-15">
		<input id="submit_button_group_login" type="submit" value="OK" style="background-color: #888; width: 50px; float: right;" >
	    </div>
	</div>
    <!-- {{ Form::close() }} -->
    
    
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
		    <center><h1>Image Linked to Youtube Movie</h1></center>
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
		Icon
	    </div>
	    <div class="index-icons">
		Icon
	    </div>
	    <div class="index-icons">
		Icon
	    </div>
	    <div class="index-icons">
		Icon
	    </div>
	    <div class="index-icons">
		Icon
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


$("#submit_button_group_login").click(function() {
    
    //check for account and group first
    var acc = $("#el_select_account").val();
    var grp = $("#el_select_group").val();
    
    if( acc != "blank" && grp != "blank" )
    {
	var data = "email="+$("#email").val()+"&password="+$("#password").val()+"&acc="+acc+"&grp="+grp;
	$.post("/v1/login",data).done(function(){
	    window.location.href="/v1/"+acc+"/"+grp;
	});
    }
    else
    {
	alert("Please complete the fields before press submit");
    }
    
});

</script>
</body>
</html>
