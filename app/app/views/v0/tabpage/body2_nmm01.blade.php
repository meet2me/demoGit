<?php if($TrueUserType == "Admin") { ?>
    <div id="bod2-acc4">
	<div id="bod2-acc4-head">
	    <div class="row back-a border-btm">
		<div class="head-title">
		    New Member Messages
		</div>
		<div class="head-pm">
		    <div id="bod2-acc4-pm">
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
				?><img src="/img/plus.png" onclick="accordShow('bod2-acc4-body','bod2-acc4-pm');"><?php
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
	
	<div id="bod2-acc4-body" style="display: none;">
	    
	    <?php
	    $admMessages = DB::table('tblAdminMessage')
		    ->where('ID','=',$ID)
		    ->where('GroupID','=',$GroupID)
		    ->get();
	    ?>
	    
	    @foreach($admMessages as $adms)
	    <!-- row -->
	    <div class="row back-b mb-1">
		<div class="section-title">
		    <?= $adms->Subject." - Days ".$adms->Days." | Hours ".$adms->Hours." | Minutes ".$adms->Minutes; ?>
		</div>
		<div class="section-buttons">
		    <div class="section-pm">
			<div id="bod2-acc4-row<?= $adms->idx; ?>-pm">
			    <img src="/img/plus.png" onclick="accordShow('bod2-acc4-row<?= $adms->idx; ?>-child','bod2-acc4-row<?= $adms->idx; ?>-pm');">
			</div>
		    </div>
		</div>
	    </div>

	    <div id="bod2-acc4-row<?= $adms->idx; ?>-child" style="display: none;" class="mb-1">
		<div class="row back-c">
		    <div class="child-title">
			<?= $adms->Subject; ?><br>
			<?= $adms->Body; ?>
		    </div>
		    <div class="f-right mr-15 mt-5" style="display: box;">
			<div style="display: table;">
			    <img
				<?php 
				if($adms->Email == 1) { echo "src=\"/img/email-yes.png\""; }
				else { echo "src=\"/img/email.png\""; }
				?>
				class="f-left mr-5">
			    <img 
				<?php 
				if($adms->SMS == 1) { echo "src=\"/img/sms-yes.png\""; }
				else { echo "src=\"/img/sms.png\""; }
				?>
				class="f-left">
			</div>
			<div style="margin: 5px 0 5px 0;">
			    <?php if($adms->Active == 1) { echo "Active"; } else { echo "Inactive"; } ?>
			</div>
			<div>
			    <div style="background-color: #444; 
				    margin-bottom: 10px;
				    padding: 5px 10px;
				    text-align: center;"
				onclick="editAdminMessage('<?= $ID; ?>','<?= $GroupID; ?>','<?= $adms->idx; ?>');">
				Edit
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	    <!-- /row -->
	    @endforeach
	    
	    <!-- ajax here -->
	    <div id="edit_admin_message"></div>
	    <!-- ajax here -->
	</div>
    </div>
<?php } ?>

