	    <!-- row -->
	    <div class="row back-b mb-1">
		<div class="section-title">
		    Select All Groups
		</div>
		<div class="section-buttons">
		    <div class="section-pm">
			<div id="bod2-acc1-1-check">
			    <img src="/img/unchecked.png" onclick="checkedBtnSelectAllGroups('<?= $ID; ?>','<?= $GroupID; ?>','<?= $TrueUserType; ?>');">
			    <input type="text" id="selectAllGroupsValue" value="0" style="display:none;">
			</div>
		    </div>
		</div>
	    </div>
	    
	    <?php if($TrueUserType == "Admin"){ 
	    //GROUWING WHAT GROUP HE/SHE HAS WITH CURRENT ID
	    $groupCheckOnTab2 = DB::table('tblGroup')->where('ID','=',$ID)->orderBy('Group','asc')->get();
	    
		//HIDDEN VALUE FOR ALL CHECKED
		?><div style="display: none;">
		    <?php
		    $valueChecked = "";
		    foreach($groupCheckOnTab2 as $cucuop)
		    {
			$valueChecked .= $cucuop->idx.",";
		    }
		    
		    $realValueChecked = substr($valueChecked,0,  strlen($valueChecked)-1);
		    
		    ?>
		    <input type="text" id="valueCheckedForSendMessage" value="<?= $realValueChecked; ?>">
		</div>
	    
		
		<?php
		foreach($groupCheckOnTab2 as $gcotb2) 
		{   
		    ?>
		    <!-- row -->
		    <div class="row back-b mb-1">
			<div class="section-title">
			    <?php echo $gcotb2->Group; ?>
			</div>
			<div class="section-buttons">
			    <div class="section-pm">
				<div id="bod2-acc1-3-check_<?= $gcotb2->idx; ?>">
				    <img src="/img/unchecked.png" onclick="checkedBtnSendMessageToCurrentGroupMembers('<?= $gcotb2->idx; ?>');">
				    <input type="text" id="currentGroupMembersValue_<?= $gcotb2->idx; ?>" value="0" style="display:none;">
				</div>
			    </div>
			</div>
		    </div>
		    <?php 
		}
	    } elseif ($TrueUserType == "Leader") { ?>
	    <!-- row -->
	    <div class="row back-b mb-1">
		<div class="section-title">
		    <?php echo $dataGroup->Group; ?>
		</div>
		<div class="section-buttons">
		    <div class="section-pm">
			<div id="bod2-acc1-3-check_<?= $gcotb2->idx; ?>">
			    <img src="/img/unchecked.png" onclick="checkedBtnSendMessageToCurrentGroupMembers('<?= $gcotb2->idx; ?>');">
			    <input type="text" id="currentGroupMembersValue_<?= $gcotb2->idx; ?>" value="0" style="display:none;">
			</div>
		    </div>
		</div>
	    </div>
	    <?php } ?>
