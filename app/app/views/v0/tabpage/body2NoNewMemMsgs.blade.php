
<div id="body-2" class="tab-body fixed-box back-a" style="display: none;">
    <div>
	<?php
	if(!Auth::check())
	{
	    ?>
	    <style>
		#formLogin { padding: 15px; }
		#formLogin input { width: 100%; }
	    </style>
	    <div id="formLogin" class="border-btm">
		<div class="row">
		    <input type="email" name="two_email" id="two_email" placeholder="Email Address" class="fixed-box">
		</div>
		<div class="row">
		    <input type="password" name="two_password" id="two_password" placeholder="Password" class="fixed-box">
		</div>
		<div class="row">
		    <input type="submit" value="Submit" class="back-c" style="color: #fff;" onclick="loginGroup('{{ $ID }}','{{ $GroupID }}');">
		</div>
	    </div>
	    <?php
	}
	?>
    </div>
    
    <?php 
    if(Auth::check())
    {
    ?>
    <div class="row border-btm">
	<div style="margin: 10px 15px 0 15px;" class="font13">
	    <div id="hiddenValueSelectionChangeOnTab2" style="display: none;"></div> <!-- need for selection chage -->
	    <select id="select_change_group_tab2" style="width: 100%;" onchange="changeUrlByTab2BySelectGroup();">
		<?php
		$changeGrpOnTab2 = DB::select("
		    select 
			tblGroup.ID, tblGroup.GroupID, tblGroup.Group, tblGroup.idx
		    from 
			tblGrpMembrs, tblGroup 
		    where 
			tblGrpMembrs.UserID = '".Auth::user()->userID."' and
			tblGroup.ID = tblGrpMembrs.ID and
			tblGroup.GroupID = tblGrpMembrs.GroupID");
		foreach($changeGrpOnTab2 as $cgotb2)
		{
		    //need to find selected group
		    //$selectedcgotb2 = DB::table('tblGroup')->where('ID','=',$cgotb2->ID)->where('GroupID','=',$cgotb2->GroupID)->first();
		    if($cgotb2->ID == $ID && $cgotb2->GroupID == $GroupID) {
		    ?><option value="<?php echo $cgotb2->idx; ?>" selected><?php echo $cgotb2->Group; ?></option><?php } else {
		    
		    ?><option value="<?php echo $cgotb2->idx; ?>"><?php echo $cgotb2->Group; ?></option><?php }
		}
		?>
	    </select>
	</div>
    </div>
    <?php
    }
    ?>
    
    
    <!-- section acc1 group -->
    <div id="bod2-acc1">
	<div id="bod2-acc1-head">
	    <div class="row back-a border-btm">
		<div class="head-title">
		    Select a Group(s) to send Message to
		</div>
		<div class="head-pm">
		    <div id="bod2-acc1-pm">
			<?php
			if(Auth::check())
			{
			    $cekPassBod2 = DB::table('tblGrpMembrs')
				    ->where('ID','=',$ID)
				    ->where('GroupID','=',$GroupID)
				    ->where('UserID','=',Auth::user()->userID)
				    ->count();
			    if($cekPassBod2 == 1)
			    {
				//for leader
				$tb1plusLeader = DB::table('tblGrpMembrs')
					->where('UserID','=',Auth::user()->userID)
					->where('ID','=',$ID)
					->where('GroupID','=',$GroupID)
					->first();
				
				//for admin (Is he/she admin for this url?)
				$tb1plusAdmin = DB::table('tblAdmin')
					->where('UserID','=',Auth::user()->userID)
					->count();
				
				if($tb1plusLeader->Leader == 1 or $tb1plusAdmin > 0)
				{
				    ?><img src="/img/plus.png" onclick="accordShow('bod2-acc1-body','bod2-acc1-pm');"><?php
				}
				else 
				{
				    ?><img src="/img/plus.png" onclick="alert('Not Allowed');"><?php
				}
			    }
			    else
			    {
				?><img src="/img/plus.png" onclick="alert('You are not a member of this group');"><?php
			    }
			}
			else
			{
			    ?><img src="/img/plus.png" onclick="alert('You are not logged in');"><?php
			}
			?>
		    </div>
		</div>
	    </div>
	</div>
	<div id="bod2-acc1-body" style="display: none;">
	    <!-- IMPORTANT! -->
	    <!--dynamic script for checked value to send message -->
	    <script>    
		<?php
		//GROWING GROUP
		$groupCheckScOnTab2 = DB::table('tblGroup')->where('ID','=',$ID)->orderBy('Group','asc')->get();

		$valueCheckedSc = "";
		foreach($groupCheckScOnTab2 as $cucuopSc)
		{
		    $valueCheckedSc .= '{ "idx":"'.$cucuopSc->idx.'","value": "\'+document.getElementById(\'currentGroupMembersValue_'.$cucuopSc->idx.'\').value+\'"},';
		}
		$realValueCheckedSc = substr($valueCheckedSc,0,  strlen($valueCheckedSc)-1);
		?>
		function sendMessageDynamic()
		{

		    //JSON DATA FORMAT FOR THIS CASE
		    //var theData = '{ "kambiang": [{ "idx":"1","value":"'+document.getElementById('currentGroupMembersValue_1').value+'" },{ "idx":"2","value":"0" }]}';
		    
		    //BELOW VALUE IS CREATING FROM PHP SCRIPT ABOVE
		    var theData = <?= '\'{ "kambiang": ['.$realValueCheckedSc.']}\''; ?>;
		    
		    var the_message = document.getElementById('bod2-inp3').value;
		    var message_subject = $("#bod2-inp2").val();
		    
		    $.post("/send_message_dynamic",{ the_message: the_message, message_subject: message_subject, nitson: theData }).done(function(data){
			document.getElementById('bod2-inp3').value = "";
			$("#bod2-inp2").val("");
			alert(data);
		    });
		}

	    </script>
	    <!-- dynamic script for checked value to send message -->
	    
	    <div id="checked_section_for_send_message">
		@include('v0.tabpage.body2_rowgroup')
	    </div>
	    
	    <!-- row -->
	    <div class="row">
		<div style="padding: 4px 15px;">
		    <input type="text" id="bod2-inp2" name="message_subject" placeholder="Enter message subject here" class="fixed-box" style="width: 100%;">
		</div>
	    </div>
	    
	    <!-- row -->
	    <div class="row">
		<div style="padding: 4px 15px;">
		    <textarea 
			id="bod2-inp3" 
			name="message" 
			class="fixed-box" 
			style="border: none; border-radius: 0; height: 175px; width: 100%;"></textarea>
		</div>
	    </div>
	    
	    <!-- row -->
	    <div style="display: none;">
		<input type="text" value="{{ $ID }}" name="ID" id="ID">
		<input type="text" value="{{ $GroupID }}" name="GroupID" id="GroupID">
	    </div>
	    
	    <!-- row -->
	    <div class="row border-btm">
		<div id="bod2-datepicker">
		    <img src="/img/calendar.png">
		</div>
		<div id="bod2-btn3" onclick="sendMessageDynamic();">SEND</div>
		<div class="bod2-acc2-section-title">Select either Email or SMS</div>
		<div id="bod2-btn5">
		    <img src="/img/sms.png" onclick="smsOn();">
		</div>
		<div id="bod2-btn4">
		    <img src="/img/email-yes.png" onclick="emailOn();">
		</div>
	    </div>
	</div>
    </div>
    <!-- /section acc1 group -->
    
    <!-- section acc3 group -->
    <div id="bod2-acc3">
	<div id="bod2-acc3-head">
	    <div class="row back-a border-btm">
		<div class="head-title">
		    Last 10 messages to group
		</div>
		<div class="head-pm">
		    <div id="bod2-acc3-pm">
			<?php
			if(Auth::check())
			{
			    $cekPassBod2 = DB::table('tblGrpMembrs')
				    ->where('ID','=',$ID)
				    ->where('GroupID','=',$GroupID)
				    ->where('UserID','=',Auth::user()->userID)
				    ->count();
			    if($cekPassBod2 == 1)
			    {
				?><img src="/img/plus.png" onclick="accordShow('bod2-acc3-body','bod2-acc3-pm');"><?php
			    }
			    else
			    {
				?><img src="/img/plus.png" onclick="alert('You are not a member of this group');"><?php
			    }
			}
			else
			{
			    ?><img src="/img/plus.png" onclick="alert('You are not logged in');"><?php
			}
			?>
		    </div>
		</div>
	    </div>
	</div>
	
	<div id="bod2-acc3-body" style="display: none;">
	    
	    @foreach($messages as $message)
	    <?php
	    if(Auth::check())
	    {
		if($message->Special == Auth::user()->userID || $message->Special == "" )
		{
		    ?>
		    <!-- row -->
		    <div class="row back-b mb-1">
			<div class="section-title">
			    {{ $message->Subject }}
			</div>
			<div class="section-buttons">
			    <div class="section-pm">
				<div id="bod2-acc3-row{{ $message->MsgID }}-pm">
				    <img src="/img/plus.png" onclick="accordShow('bod2-acc3-row{{ $message->MsgID }}-child','bod2-acc3-row{{ $message->MsgID }}-pm');">
				</div>
			    </div>
			    <div class="section-pm">
				<?php if($message->Email == 1) { ?>
				    <img src="/img/email.png">
				<?php } ?>

				<?php if($message->SMS == 1) { ?>
				    <img src="/img/sms-yes.png">
				<?php } ?>
			    </div>
			</div>
		    </div>

		    <div id="bod2-acc3-row{{ $message->MsgID }}-child" style="display: none;" class="mb-1">
			<div class="row back-c">
			    <div class="child-title">
				{{ $message->Body }}
			    </div>
			</div>
		    </div>
		    <!-- /row -->
		    <?php
		}
	    }
	    ?>
		
	    @endforeach
	</div>
    </div>
    <!-- /section acc3 group -->
    
    @include('v0.tabpage.body2_nmm01')
</div>