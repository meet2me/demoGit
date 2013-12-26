	<div id="ocm" style="border-bottom: 1px solid #888;">
	    <div id="ocm-head">
		<div class="row back-a">
		    <div class="head-title">
			Other Current Members
		    </div>
		    <div class="section-buttons">
			<div class="back-a section-pm">
			    <div id="ocm-pm">
				<?php
				if(Auth::check())
				{
					if($TrueUserType != "Basic") {
						$cekPassBod2 = DB::table('tblGrpMembrs')
							->where('ID','=',$ID)
							->where('GroupID','=',$GroupID)
							->where('UserID','=',Auth::user()->userID)
							->count();
						if($cekPassBod2 == 1)
						{
						?><img src="/img/plus.png" 
							 onclick="accordShow('ocm-body','ocm-pm');"><?php
						}
						else
						{
						?><img src="/img/plus.png" 
							 onclick="alert('You are not member of this group');"><?php
						}
					}
					else
					{
						?><img src="/img/plus.png"  onclick="alert('Not Allowed');"><?php
					}
				}
				else
				{
				    ?><img src="/img/plus.png" 
					 onclick="alert('You are not logged in');"><?php
				}
				?>
			    </div>
			</div>
			<div class="back-a section-pm">
			    <div style="font-size: 2.5em; font-weight: bold; margin: 0 0 0 4px;">A</div>
			</div>
			<div class="back-a section-pm">
			    <div style="font-size: 2.5em; font-weight: bold; margin: 0 0 0 4px;">L</div>
			</div>
		    </div>
		</div>
	    </div>
	    <div id="ocm-body" style="display: none;">
		@foreach($dataOCMs as $dataOCM)
		<!-- row1 -->
		<?php
		//ANGL = Admin and Group Leaders
		if(!Auth::check())
		{
		    //show nothing
		}
		else
		{
		    //checking member of this group
		    $OCMMember = DB::table('tblGrpMembrs')
			    ->where('ID','=',$ID)
			    ->where('GroupID','=',$GroupID)
			    ->where('UserID','=',Auth::user()->userID)
			    ->count();
		    if($OCMMember == 0 )
		    {
			//show nothing
		    }
		    else
		    {
			
			//OK, We've got TrueUserType. 
			//if(TrueUserType = Basic) { Just see dropdown without function }
			//elseif(TrueUserType = Leader) { Ability to see dropdown. Ability to checked L? I want to ask Colin for this }
			//elseif(TrueUserType = Admin) { Ability to see dropdown. Ability to checked L and A }

			//USERTYPE IS BASIC
			if($TrueUserType == "Basic") {
			?>
			<div class="row back-b border-btm">
			    <div class="section-title">
				{{ $dataOCM->firstname." ".$dataOCM->lastname }}
			    </div>
			    <div class="section-buttons">
				<div class="section-pm">
				    <div id="ocm-row{{ $dataOCM->userID }}-pm">
					<img src="/img/plus.png"  onclick="alert('Not Allowed');">
				    </div>
				</div>
				<div class="section-pm">
				    <!-- check 1 = Admin -->
				    <div id="ocm-row{{ $dataOCM->userID }}-check1">
					<?php 
					//check for 'current' user
					$CountCheckAdmForAdminNGroupLeader = DB::table('tblAdmin')
									    ->where('ID','=',$ID)
									    ->where('UserID','=',$dataOCM->userID)
									    ->count(); 
					if($CountCheckAdmForAdminNGroupLeader ==1)
					{
					    ?><img src="/img/checked.png" onclick="alert('Not Allowed');"><?php
					} 
					else    
					{ 
					    ?><img src="/img/unchecked.png" onclick="alert('Not Allowed');"><?php 
					} 
					?>
				    </div>
				    <!-- /check 1 = Admin -->
				</div>
				<div class="section-pm">
				    <!-- check 2 = Leader -->
				    <div id="ocm-row{{ $dataOCM->userID }}-check2">
					<?php if($dataOCM->Leader == 1) : ?>
					    <img src="/img/checked.png" onclick="alert('Not Allowed');">
					<?php else : ?>
					    <img src="/img/unchecked.png" onclick="alert('Not Allowed');">
					<?php endif; ?>
				    </div>
				    <!-- /check 2 = Leader -->
				</div>
			    </div>
			</div>
			<div id="ocm-row{{ $dataOCM->userID }}-child" style="display: none;" class="mb-1">
			    <div class="row back-c">
				<div class="child-title">
				    <a href="mailto:{{ $dataOCM->email }}" class="links white-font">{{ $dataOCM->email }}</a><br>
				    <a href="tel:{{ $dataOCM->phone }}" class="links white-font">{{ $dataOCM->phone }}</a>
				</div>
				<div class="section-buttons">
				    <div class="section-pm">
					<div id="ocm-row{{ $dataOCM->userID }}-child-delno">
					    <img src="/img/delete.png" onclick="delYes('ocm-row{{ $dataOCM->userID }}-child-delno');">
					</div>
				    </div>
				    <div class="section-pm">
					<div id="ocm-row{{ $dataOCM->userID }}-child-sno">
					    <img src="/img/s-yes.png" onclick="sNo('ocm-row{{ $dataOCM->userID }}-child-sno');">
					</div>
				    </div>
				</div>
			    </div>
			</div>
			<?php }
			//USERTYPE IS LEADER
			elseif($TrueUserType == "Leader") {
			?>
			<div class="row back-b border-btm">
			    <div class="section-title">
				{{ $dataOCM->firstname." ".$dataOCM->lastname }}
			    </div>
			    <div class="section-buttons">
				<div class="section-pm">
				    <div id="ocm-row{{ $dataOCM->userID }}-pm">

					<img src="/img/plus.png" onclick="accordShow('ocm-row{{ $dataOCM->userID }}-child','ocm-row{{ $dataOCM->userID }}-pm');">
				    </div>
				</div>
				<div class="section-pm">
				    <!-- check 1 = Admin -->
				    <div id="ocm-row{{ $dataOCM->userID }}-check1">
					<?php 
					//check for 'current' user
					$CountCheckAdmForAdminNGroupLeader = DB::table('tblAdmin')
									    ->where('ID','=',$ID)
									    ->where('UserID','=',$dataOCM->userID)
									    ->count(); 
					if($CountCheckAdmForAdminNGroupLeader ==1)
					{
					    ?><img src="/img/checked.png"><?php
					} 
					else    
					{ 
					    ?><img src="/img/unchecked.png" onclick="checkedBtn('ocm-row{{ $dataOCM->userID }}-check1');"><?php 

					} 
					?>
				    </div>
				    <!-- /check 1 = Admin -->
				</div>
				<div class="section-pm">
				    <!-- check 2 = Leader -->
				    <div id="ocm-row{{ $dataOCM->userID }}-check2">
					<?php if($dataOCM->Leader == 1) : ?>
					    <img src="/img/checked.png" onclick="uncheckedLeader('{{ $dataOCM->ID }}','{{ $dataOCM->GroupID }}','{{ $dataOCM->userID }}');">
					<?php else : ?>
					    <img src="/img/unchecked.png" onclick="checkedLeader('{{ $dataOCM->ID }}','{{ $dataOCM->GroupID }}','{{ $dataOCM->userID }}');">
					<?php endif; ?>
				    </div>
				    <!-- /check 2 = Leader -->
				</div>
			    </div>
			</div>
			<div id="ocm-row{{ $dataOCM->userID }}-child" style="display: none;" class="mb-1">
			    <div class="row back-c">
				<div class="child-title">
				    <a href="mailto:{{ $dataOCM->email }}" class="links white-font">{{ $dataOCM->email }}</a><br>
				    <a href="tel:{{ $dataOCM->phone }}" class="links white-font">{{ $dataOCM->phone }}</a>
				</div>
				<div class="section-buttons">
				    <div class="section-pm">
					<div id="ocm-row{{ $dataOCM->userID }}-child-delno">
					    <img src="/img/delete.png" onclick="delYes('ocm-row{{ $dataOCM->userID }}-child-delno');">
					</div>
				    </div>
				    <div class="section-pm">
					<div id="ocm-row{{ $dataOCM->userID }}-child-sno">
					    <img src="/img/s-yes.png" onclick="sNo('ocm-row{{ $dataOCM->userID }}-child-sno');">
					</div>
				    </div>
				</div>
			    </div>
			</div>
			<?php } 
			//USERTYPE IS ADMIN
			elseif($TrueUserType == "Admin") {
			?>
			<div class="row back-b border-btm">
			    <div class="section-title">
				{{ $dataOCM->firstname." ".$dataOCM->lastname }}
			    </div>
			    <div class="section-buttons">
				<div class="section-pm">
				    <div id="ocm-row{{ $dataOCM->userID }}-pm">

					<img src="/img/plus.png" onclick="accordShow('ocm-row{{ $dataOCM->userID }}-child','ocm-row{{ $dataOCM->userID }}-pm');">
				    </div>
				</div>
				<div class="section-pm">
				    <!-- check 1 = Admin -->
				    <div id="ocm-row{{ $dataOCM->userID }}-check1">
					<?php 
					//check for 'current' user
					$CountCheckAdmForAdminNGroupLeader = DB::table('tblAdmin')
									    ->where('ID','=',$ID)
									    ->where('UserID','=',$dataOCM->userID)
									    ->count(); 
					if($CountCheckAdmForAdminNGroupLeader ==1)
					{
					    ?><img src="/img/checked.png" onclick="uncheckedAdm('{{ $dataOCM->ID }}','{{ $dataOCM->GroupID }}','{{ $dataOCM->userID }}');"><?php
					} 
					else    
					{ 
					    ?><img src="/img/unchecked.png" onclick="checkedAdm('{{ $dataOCM->ID }}','{{ $dataOCM->GroupID }}','{{ $dataOCM->userID }}');"><?php 

					} 
					?>
				    </div>
				    <!-- /check 1 = Admin -->
				</div>
				<div class="section-pm">
				    <!-- check 2 = Leader -->
				    <div id="ocm-row{{ $dataOCM->userID }}-check2">
					<?php if($dataOCM->Leader == 1) : ?>
					    <img src="/img/checked.png" onclick="uncheckedLeader('{{ $dataOCM->ID }}','{{ $dataOCM->GroupID }}','{{ $dataOCM->userID }}');">
					<?php else : ?>
					    <img src="/img/unchecked.png" onclick="checkedLeader('{{ $dataOCM->ID }}','{{ $dataOCM->GroupID }}','{{ $dataOCM->userID }}');">
					<?php endif; ?>
				    </div>
				    <!-- /check 2 = Leader -->
				</div>
			    </div>
			</div>
			<div id="ocm-row{{ $dataOCM->userID }}-child" style="display: none;" class="mb-1">
			    <div class="row back-c">
				<div class="child-title">
				    <a href="mailto:{{ $dataOCM->email }}" class="links white-font">{{ $dataOCM->email }}</a><br>
				    <a href="tel:{{ $dataOCM->phone }}" class="links white-font">{{ $dataOCM->phone }}</a>
				</div>
				<div class="section-buttons">
				    <div class="section-pm">
					<div id="ocm-row{{ $dataOCM->userID }}-child-delno">
					    <img src="/img/delete.png" onclick="delYes('ocm-row{{ $dataOCM->userID }}-child-delno');">
					</div>
				    </div>
				    <div class="section-pm">
					<div id="ocm-row{{ $dataOCM->userID }}-child-sno">
					    <img src="/img/s-yes.png" onclick="sNo('ocm-row{{ $dataOCM->userID }}-child-sno');">
					</div>
				    </div>
				</div>
			    </div>
			</div>
			<?php }
		    }
		}
		?>
		<!-- /row1 -->
		@endforeach
	    </div>
	</div>
