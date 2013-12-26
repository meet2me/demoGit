<div id="body-1" class="tab-body fixed-box">
    <?php
    if(!Auth::check())
    {
    ?>
    <!-- register -->
    <div>
	<div id="hiddenValueSelectionChange" style="display: none;"></div> <!-- NEED FOR CHANGING URL -->
	<div class="pad15 back-a font13" style="padding-bottom: 0;">
	    <select id="j_group" style="width: 100%;" onchange="changeUrlByTab1();">
		<?php 
		$selectAs = DB::table('tblGroup')->where('ID','=',$ID)->where('GroupID','=',$GroupID)->first();  
		if($selectAs->PassRequired == 0)
		{
		    $selectAas = DB::table('tblGroup')->where('ID','=',$ID)->where('PassRequired','=','0')->get();  
		    foreach($selectAas as $selA)
		    {
			$selectJoinSelected = DB::table('tblGroup')->where('ID','=',$ID)->where('GroupID','=',$GroupID)->first();
			if($selectJoinSelected->ID == $selA->ID and $selectJoinSelected->GroupID == $selA->GroupID)
			{
			    ?><option value="{{ $selA->idx }}" selected>{{ $selA->Group }}</option><?php
			}
			else
			{
			    ?><option value="{{ $selA->idx }}">{{ $selA->Group }}</option><?php
			}
		    }
		}
		else 
		{
		    $selectAbs = DB::table('tblGroup')->where('ID','=',$ID)->get();  
		    foreach($selectAbs as $selAb)
		    {
			$selectJoinSelected = DB::table('tblGroup')->where('ID','=',$ID)->where('GroupID','=',$GroupID)->first();
			if($selectJoinSelected->ID == $selAb->ID and $selectJoinSelected->GroupID == $selAb->GroupID)
			{
			    ?><option value="{{ $selAb->idx }}" selected>{{ $selAb->Group }}</option><?php
			}
			else
			{
			    ?><option value="{{ $selAb->idx }}">{{ $selAb->Group }}</option><?php
			}
		    }
		}
		?>
	    </select>
	</div>
		<div class="pad15 back-a font13">
	    When you join this group you may receive a maximum of 5 automated messages over the first 30 days. We will also send relevant messages from the group from time to time.  You can stop messages at any time by sending a blank email to stop@groupmessage.co.uk
	</div>
    
	<div id="inputs" class="pad15 back-a font12">
	    <!-- current group -->
	    <div style="display: none;">
		<input type="text" value="" name="group">
	    </div>
	    <!-- current group -->
	    <div class="row">
		<input type="text" name="firstname" id="j_firstname" placeholder="First Name" class="fixed-box">
	    </div>
	    <div class="row">
		<input type="text" name="lastname" id="j_lastname" placeholder="Last Name" class="fixed-box">
	    </div>
	    <div class="row">
		<input type="text" name="email" id="j_email" placeholder="Email Address" class="fixed-box">
	    </div>
	    <div class="row">
		<input type="text" name="phone" id="j_phone" placeholder="Cell / Mobile" class="fixed-box">
	    </div>
		 <div class="row">
		* Enter mobile number in international format<br>
		&nbsp;&nbsp;&nbsp;Eg: UK +4412345678 USA +12212345678
	    </div>
	    <div class="row">
		<input type="password" name="password" id="j_password" placeholder="Password" class="fixed-box">
	    </div>
	    <div class="row">
		<input type="password" name="password" id="j_password2" placeholder="Confirm Password" class="fixed-box">
	    </div>
	   

	    <div class="row">
		<center>
		    <input type="submit" value="JOIN GROUP" class="button-join-leave" onclick="postRegister();">
		</center>
	    </div>
	</div>
    </div>
    <!-- /register -->
    <?php
    }
    ?>
    
    
    <?php
    if(Auth::check())
    {
    ?>
    <!-- 3 buttons -->
    <div>
	<div class="row back-a font13">
	    <div style="padding: 10px 15px;">
		<div class="back-c" style="padding: 4px 6px; float: left;" onclick="joinGroupOnTab1();">
		    Join Group
		</div>
		<div class="back-c" style="padding: 4px 6px; float: left; margin-left: 5px;" onclick="leaveGroupOnTab1();">
		    Leave Group
		</div>
		<div class="back-c" style="padding: 4px 6px; float: left; margin-left: 5px;" onclick="changeDetailsOnTab1();">
		    Change Details
		</div>
	    </div>
	</div>
	<div id="join_group_body_at_tab1" class="back-a">
	    <div style="padding: 5px 15px;">
		<div id="hiddenValueSelectionChange" style="display: none;"></div> <!-- NEED FOR CHANGING URL -->
		<div class="back-a font13" style="padding-bottom: 5px;">
		    <select id="select_join_group_tab1" onchange="changeUrlByTab1BySelectJoin();" style="width: 100%;" >
			<?php 
			$selectAs = DB::table('tblGroup')->where('ID','=',$ID)->where('GroupID','=',$GroupID)->first();  
			if($selectAs->PassRequired == 0)
			{
			    $selectAas = DB::table('tblGroup')->where('ID','=',$ID)->where('PassRequired','=','0')->get();  
			    foreach($selectAas as $selA)
			    {
				$selectJoinSelected = DB::table('tblGroup')->where('ID','=',$ID)->where('GroupID','=',$GroupID)->first();
				if($selectJoinSelected->ID == $selA->ID and $selectJoinSelected->GroupID == $selA->GroupID)
				{
				    ?><option value="{{ $selA->idx }}" selected>{{ $selA->Group }}</option><?php
				}
				else
				{
				    ?><option value="{{ $selA->idx }}">{{ $selA->Group }}</option><?php
				}
			    }
			}
			else 
			{
			    $selectAbs = DB::table('tblGroup')->where('ID','=',$ID)->get();  
			    foreach($selectAbs as $selAb)
			    {
				$selectJoinSelected = DB::table('tblGroup')->where('ID','=',$ID)->where('GroupID','=',$GroupID)->first();
				if($selectJoinSelected->ID == $selAb->ID and $selectJoinSelected->GroupID == $selAb->GroupID)
				{
				    ?><option value="{{ $selAb->idx }}" selected>{{ $selAb->Group }}</option><?php
				}
				else
				{
				    ?><option value="{{ $selAb->idx }}">{{ $selAb->Group }}</option><?php
				}
			    }
			}
			?>
		    </select>
		</div>
		<div class="row">
		    <center>
			<input type="submit" value="JOIN GROUP" class="back-c" style=" color: #fff; padding: 4px 15px;" onclick="joinGroup();">
		    </center>
		</div>
	    </div>
	</div>
	<div id="leave_group_body_at_tab1" class="back-a" style="display: none;">
	    <div style="padding: 5px 15px;">
		<div class="back-a font13" style="padding-bottom: 5px; color: #fff;">
		    Please click below button to leave current group
		</div>
		<div class="row">
		    <center>
			<input type="submit" value="LEAVE GROUP" class="back-c" style=" color: #fff; padding: 4px 15px;" onclick="leaveGroup('{{ $ID }}','{{ $GroupID }}');">
		    </center>
		</div>
	    </div>
	</div>
	<div id="change_details_body_at_tab1" class="back-a" style="display: none;">
	    <div style="padding: 5px 15px;">
		<div class="row">
		    <input type="text" name="firstname" placeholder="First Name" value="{{ Auth::user()->firstname }}" style="width: 100%;">
		</div>
		<div class="row">
		    <input type="text" name="lastname" placeholder="Last Name" value="{{ Auth::user()->lastname }}" style="width: 100%">
		</div>
		<div class="row">
		    <input type="email" name="email" placeholder="Email Address" value="{{ Auth::user()->email }}" style="width: 100%">
		</div>
		<div class="row">
		    <input type="password" name="password" placeholder="Enter Existing Password" style="width: 100%">
		</div>
		<div class="row">
		    <input type="password" name="nu_pass" placeholder="New Password - Or Leave Blank" style="width: 100%">
		</div>
		<div class="row">
		    <input type="password" name="nu_pass_confirm" placeholder="Confirm New Password" style="width: 100%">
		</div>
		<div class="row">
		    <center>
			<input type="submit" value="CHANGE DETAILS" class="back-c" style=" color: #fff; padding: 4px 15px;">
		    </center>
		</div>
	    </div>
	</div>
    </div>
    <!-- /3 buttons -->
    <?php
    }
    ?>
</div>
    
<script>
    function postRegister()
    {
	var group = $("#j_group").val();
	var firstname = $("#j_firstname").val();
	if(firstname === "")
	{
	    alert("First Name is required");
	    $("#j_firstname").focus();
	    return;
	}
	var lastname = $("#j_lastname").val();
	if(lastname === "")
	{
	    alert("Last Name is required");
	    $("#j_lastname").focus();
	    return;
	}
	var email = $("#j_email").val();
	if(email === "")
	{
	    alert("Email is required");
	    $("#j_email").focus();
	    return;
	}
	var phone = $("#j_phone").val();
	if(phone === "")
	{
	    alert("Phone is required");
	    $("#j_phone").focus();
	    return;
	}
	var password = $("#j_password").val();
	if(password === "")
	{
	    alert("Password is required");
	    $("#j_password").focus();
	    return;
	}
	var password2 = $("#j_password2").val();
	if(password != password2)
	{
	    alert("Password and Password confirmation do not match");
	    $("#j_password2").focus();
	    return;
	}
	
	var data = "group="+group+"&firstname="+firstname+"&lastname="+lastname+"&email="+email+"&phone="+phone+"&password="+password;
	
	$.post("/register",data).done(function(data){
	    
	    if (data === 'fail')
	    {
		alert("You have already joined of groupmessage.co.uk. If you want to join a group, please login first.");
	    }
	    else
	    {
		alert("Congratulations, You have joined the Group but you are not ready to receive messages. Please read the important information when you close this message.");
		window.location.href = '/confirm?ID=<?= $ID; ?>&GroupID=<?= $GroupID; ?>'+data+'#confirm';
	    }
	});
    }
    
    
</script>