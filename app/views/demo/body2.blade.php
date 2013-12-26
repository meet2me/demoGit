<div id="body-2" class="tab-body fixed-box back-a">
    <!-- section acc0 group -->
    <div id="bod2-acc0">
	<div class="bod2-acc0-rows">
	    <div id="bod2-btn1">Change Group</div>
	</div>
	<div class="bod2-acc0-rows">
	    <input type="text" placeholder="To send a message enter your email address" id="bod2-inp1" name="user_email"> 
	    <div id="bod2-btn2">Done</div>
	</div>
    </div>
    <!-- /section acc0 group -->
    
    <!-- section acc1 group -->
    <div id="bod2-acc1">
	<div id="bod2-acc1-head">
	    <div class="row back-a mb-1">
		<div class="head-title">
		    Select a Group(s) to send Message to
		</div>
		<div class="head-pm">
		    <div id="bod2-acc1-pm">
			<?php 
			//password required & not
			if($need_password == 0 ) { ?>
			<img src="/img/plus.png" onclick="accordShow('bod2-acc1-body','bod2-acc1-pm');">
			<?php } else { ?>
			<img src="/img/plus.png" onclick="alert('Password Required. Please login first!');">
			<?php } ?>
		    </div>
		</div>
	    </div>
	</div>
	<div id="bod2-acc1-body" style="display: none;">
	    
	    <!-- row -->
	    <div class="row back-b mb-1">
		<div class="section-title">
		    Select All Groups
		</div>
		<div class="section-buttons">
		    <div class="section-pm">
			<div id="bod2-acc1-1-check">
			    <img src="/img/unchecked.png" onclick="checkedBtn('bod2-acc1-1-check');">
			</div>
		    </div>
		</div>
	    </div>
	    
	    <!-- row -->
	    <div class="row back-b mb-1">
		<div class="section-title">
		    The Demo Group
		</div>
		<div class="section-buttons">
		    <div class="section-pm">
			<div id="bod2-acc1-2-check">
			    <img src="/img/unchecked.png" onclick="checkedBtn('bod2-acc1-2-check');">
			</div>
		    </div>
		</div>
	    </div>
	    
	    <!-- row -->
	    <div class="row back-b mb-1">
		<div class="section-title">
		    Another Group (disabled for this demo)
		</div>
		<div class="section-buttons">
		    <div class="section-pm">
			<div id="bod2-acc1-3-check">
			    <img src="/img/unchecked.png" onclick="checkedBtn('bod2-acc1-3-check');">
			</div>
		    </div>
		</div>
	    </div>
	    
	    <!-- row -->
	    <div class="row">
		<input type="text" id="bod2-inp2" name="message_subject" placeholder="Enter message subject here">
	    </div>
	    
	    <!-- row -->
	    <div class="row">
		<textarea id="bod2-inp3" name="message"></textarea>
	    </div>
	    
	    <!-- row -->
	    <div style="display: none;">
		
		
	    </div>
	    
	    <!-- row -->
	    <div class="row">
		<div id="bod2-datepicker">
		    <img src="/img/calendar.png">
		</div>
		<div id="bod2-btn3">SEND</div>
		<div class="bod2-acc2-section-title">Select either Email or SMS</div>
		<div id="bod2-btn5">
		    <img src="sms.png" onclick="smsOn();">
		</div>
		<div id="bod2-btn4">
		    <img src="/img/email.png" onclick="emailOn();">
		</div>
	    </div>
	    
	</div>
    </div>
    <!-- /section acc1 group -->
    
    <!-- section acc3 group -->
    <div id="bod2-acc3">
	<div id="bod2-acc3-head">
	    <div class="row back-a mb-1">
		<div class="head-title">
		    Last 10 messages to group
		</div>
		<div class="head-pm">
		    <div id="bod2-acc3-pm">
			<img src="/img/minus.png" onclick="accordHide('bod2-acc3-body','bod2-acc3-pm');">
		    </div>
		</div>
	    </div>
	</div>
	
	<div id="bod2-acc3-body">
	    @foreach($messages as $message)
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
			    <img src="/img/email-yes.png">
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
	    @endforeach
	</div>
    </div>
    <!-- /section acc3 group -->
    
</div>