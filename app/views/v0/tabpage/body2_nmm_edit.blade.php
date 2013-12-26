<!-- row -->
<div class="row back-b mb-1">
    <div style="padding: 5px 15px 5px 15px;">
	<div class="row">
	    <div style="display: table; font-size: 1.3em; float: left; margin-top: 8px;">
		Edit New Member Message 
	    </div>
	    <div>
		<div style="float: right; font-size: 1.3em; padding: 5px 10px;" 
		     class="back-c"
		     onclick="saveAdminMessage('<?= $ID; ?>','<?= $GroupID; ?>','<?= $msg->idx; ?>');">
		    Save
		</div>
		<select name="Active" style="float: right; margin: 0 5px 0 0;">
		    <option value="1" <?php if($msg->Active == 1) echo "Selected"; ?>>Active</option>
		    <option value="0" <?php if($msg->Active == 0) echo "Selected"; ?>>Inactive</option>
		</select>
	    </div>  
	</div>
	<div class="row">
	    <input type="text" 
		   style="width: 100%;"
		   name="Subject"
		   value="<?= $msg->Subject; ?>">
	</div>
	<div class="row">
	    <textarea style="border: 1px solid #fff;
		    border-radius: 0;
		    height: 80px; 
		    width: 100%;"
		name="Body"><?= $msg->Body; ?></textarea>
	</div>
	<div class="row">
	    <div style="display: table; float: left; margin: 5px 0 0 0;">
		<label style="font-size: 1.2em;">Days</label>
		<input type="text"
		       style="height: 25px; margin: 0 0 0 3px; padding: 0; width: 25px;"
		       name="Days"
		       value="<?=$msg->Days; ?>">
	    </div>
	    <div style="display: table; float: left; margin: 5px 0 0 10px;">
		<label style="font-size: 1.2em;">Hours</label>
		<input type="text" 
		       style="height: 25px; margin: 0 0 0 3px; padding: 0; width: 25px;"
		       name="Hours"
		       value="<?=$msg->Hours; ?>">
	    </div>
	    <div style="display: table; float: left; margin: 5px 0 0 10px;">
		<label style="font-size: 1.2em;">Min</label>
		<input type="text" 
		       style="height: 25px; margin: 0 0 0 3px; padding: 0; width: 25px;"
		       name="Minutes"
		       value="<?=$msg->Minutes; ?>">
	    </div>
	    <div style="display: table; float: left; margin: 5px 0 0 10px;">
		<div style="display: table; font-size: 1.2em; margin-top: 8px;">After Joining</div>
	    </div>
	    <div id="EmAdmMsg" style="display: table; float: left; margin: 5px 0 0 10px;">
		<?php
		if($msg->Email == 1) 
		{ 
		    echo '<img src="/img/email-yes.png" onclick="adminMsgEmailOff();">'; 
		    echo '<input type="text" name="Email" value="1" style="display: none;">';
		}
		else 
		{ 
		    echo '<img src="/img/email.png" onclick="adminMsgEmailOn();">'; 
		    echo '<input type="text" name="Email" value="0" style="display: none;">';
		}
		?>
	    </div>
	    <div id="SmsAdmMsg" style="display: table; float: left; margin: 5px 0 0 10px;">
		<?php
		if($msg->SMS == 1) 
		{ 
		    echo '<img src="/img/sms-yes.png" onclick="adminMsgSmsOff();">'; 
		    echo '<input type="text" name="SMS" value="1" style="display: none;">';
		}
		else 
		{ 
		    echo '<img src="/img/sms.png" onclick="adminMsgSmsOn();">'; 
		    echo '<input type="text" name="SMS" value="0" style="display: none;">';
		}
		?>
	    </div>
	</div>
    </div>
</div>
<!-- /row -->

