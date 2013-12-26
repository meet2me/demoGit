	<div id="allMem" style="border-bottom: 1px solid #888;">
	    <div id="allMem-head">
		<div class="row back-a">
		    <div class="head-title">
			Show All Members
		    </div>
		    <div class="section-buttons">
			<div class="back-a section-pm">
			    <div id="allMem-pm">
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
							 onclick="accordShow('allMem-body','allMem-pm');"><?php
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
	    <div id="allMem-body" style="display: none;">
		
		@foreach($dataALM as $dataALMa)
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
		    $SAMMember = DB::table('tblGrpMembrs')
			    ->where('ID','=',$ID)
			    ->where('GroupID','=',$GroupID)
			    ->where('UserID','=',Auth::user()->userID)
			    ->count();
		    if($SAMMember == 0 )
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
				{{ $dataALMa->firstname." ".$dataALMa->lastname }}
			    </div>
			    <div class="section-buttons">
				<div class="section-pm">
				    <div id="allMem-row{{ $dataALMa->userID }}-pm">
					<img src="/img/plus.png"  onclick="alert('Not Allowed');">
				    </div>
				</div>
				<div class="section-pm">
				    <!-- check 1 = Admin -->
				    <div id="allMem-row{{ $dataALMa->userID }}-check1">
					<?php 
					//check for 'current' user
					$CountCheckAdmForAdminNGroupLeader = DB::table('tblAdmin')
									    ->where('ID','=',$ID)
									    ->where('UserID','=',$dataALMa->userID)
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
				    <div id="allMem-row{{ $dataALMa->userID }}-check2">
					<?php if($dataALMa->Leader == 1) : ?>
					    <img src="/img/checked.png" onclick="alert('Not Allowed');">
					<?php else : ?>
					    <img src="/img/unchecked.png" onclick="alert('Not Allowed');">
					<?php endif; ?>
				    </div>
				    <!-- /check 2 = Leader -->
				</div>
			    </div>
			</div>
			<div id="allMem-row{{ $dataALMa->userID }}-child" style="display: none;" class="mb-1">
			    <div class="row back-c">
				<div class="child-title">
				    <a href="mailto:{{ $dataALMa->email }}" class="links white-font">{{ $dataALMa->email }}</a><br>
				    <a href="tel:{{ $dataALMa->phone }}" class="links white-font">{{ $dataALMa->phone }}</a>
				</div>
				<div class="section-buttons">
				    <div class="section-pm">
					<div id="allMem-row{{ $dataALMa->userID }}-child-delno">
					    <img src="/img/delete.png" onclick="delYes('allMem-row{{ $dataALMa->userID }}-child-delno');">
					</div>
				    </div>
				    <div class="section-pm">
					<div id="allMem-row{{ $dataALMa->userID }}-child-sno">
					    <img src="/img/s-yes.png" onclick="sNo('allMem-row{{ $dataALMa->userID }}-child-sno');">
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
				{{ $dataALMa->firstname." ".$dataALMa->lastname }}
			    </div>
			    <div class="section-buttons">
				<div class="section-pm">
				    <div id="allMem-row{{ $dataALMa->userID }}-pm">

					<img src="/img/plus.png" onclick="accordShow('allMem-row{{ $dataALMa->userID }}-child','allMem-row{{ $dataALMa->userID }}-pm');">
				    </div>
				</div>
				<div class="section-pm">
				    <!-- check 1 = Admin -->
				    <div id="allMem-row{{ $dataALMa->userID }}-check1">
					<?php 
					//check for 'current' user
					$CountCheckAdmForAdminNGroupLeader = DB::table('tblAdmin')
									    ->where('ID','=',$ID)
									    ->where('UserID','=',$dataALMa->userID)
									    ->count(); 
					if($CountCheckAdmForAdminNGroupLeader ==1)
					{
					    ?><img src="/img/checked.png"><?php
					} 
					else    
					{ 
					    ?><img src="/img/unchecked.png" onclick="checkedBtn('allMem-row{{ $dataALMa->userID }}-check1');"><?php 

					} 
					?>
				    </div>
				    <!-- /check 1 = Admin -->
				</div>
				<div class="section-pm">
				    <!-- check 2 = Leader -->
				    <div id="allMem-row{{ $dataALMa->userID }}-check2">
					<?php if($dataALMa->Leader == 1) : ?>
					    <img src="/img/checked.png" onclick="uncheckedLeader('{{ $dataALMa->ID }}','{{ $dataALMa->GroupID }}','{{ $dataALMa->userID }}');">
					<?php else : ?>
					    <img src="/img/unchecked.png" onclick="checkedLeader('{{ $dataALMa->ID }}','{{ $dataALMa->GroupID }}','{{ $dataALMa->userID }}');">
					<?php endif; ?>
				    </div>
				    <!-- /check 2 = Leader -->
				</div>
			    </div>
			</div>
			<div id="allMem-row{{ $dataALMa->userID }}-child" style="display: none;" class="mb-1">
			    <div class="row back-c">
				<div class="child-title">
				    <a href="mailto:{{ $dataALMa->email }}" class="links white-font">{{ $dataALMa->email }}</a><br>
				    <a href="tel:{{ $dataALMa->phone }}" class="links white-font">{{ $dataALMa->phone }}</a>
				</div>
				<div class="section-buttons">
				    <div class="section-pm">
					<div id="allMem-row{{ $dataALMa->userID }}-child-delno">
					    <img src="/img/delete.png" onclick="delYes('allMem-row{{ $dataALMa->userID }}-child-delno');">
					</div>
				    </div>
				    <div class="section-pm">
					<div id="allMem-row{{ $dataALMa->userID }}-child-sno">
					    <img src="/img/s-yes.png" onclick="sNo('allMem-row{{ $dataALMa->userID }}-child-sno');">
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
				{{ $dataALMa->firstname." ".$dataALMa->lastname }}
			    </div>
			    <div class="section-buttons">
				<div class="section-pm">
				    <div id="allMem-row{{ $dataALMa->userID }}-pm">

					<img src="/img/plus.png" onclick="accordShow('allMem-row{{ $dataALMa->userID }}-child','allMem-row{{ $dataALMa->userID }}-pm');">
				    </div>
				</div>
				<div class="section-pm">
				    <!-- check 1 = Admin -->
				    <div id="allMem-row{{ $dataALMa->userID }}-check1">
					<?php 
					//check for 'current' user
					$CountCheckAdmForAdminNGroupLeader = DB::table('tblAdmin')
									    ->where('ID','=',$ID)
									    ->where('UserID','=',$dataALMa->userID)
									    ->count(); 
					if($CountCheckAdmForAdminNGroupLeader ==1)
					{
					    ?><img src="/img/checked.png" onclick="uncheckedAdm('{{ $dataALMa->ID }}','{{ $dataALMa->GroupID }}','{{ $dataALMa->userID }}');"><?php
					} 
					else    
					{ 
					    ?><img src="/img/unchecked.png" onclick="checkedAdm('{{ $dataALMa->ID }}','{{ $dataALMa->GroupID }}','{{ $dataALMa->userID }}');"><?php 

					} 
					?>
				    </div>
				    <!-- /check 1 = Admin -->
				</div>
				<div class="section-pm">
				    <!-- check 2 = Leader -->
				    <div id="allMem-row{{ $dataALMa->userID }}-check2">
					<?php if($dataALMa->Leader == 1) : ?>
					    <img src="/img/checked.png" onclick="uncheckedLeader('{{ $dataALMa->ID }}','{{ $dataALMa->GroupID }}','{{ $dataALMa->userID }}');">
					<?php else : ?>
					    <img src="/img/unchecked.png" onclick="checkedLeader('{{ $dataALMa->ID }}','{{ $dataALMa->GroupID }}','{{ $dataALMa->userID }}');">
					<?php endif; ?>
				    </div>
				    <!-- /check 2 = Leader -->
				</div>
			    </div>
			</div>
			<div id="allMem-row{{ $dataALMa->userID }}-child" style="display: none;" class="mb-1">
			    <div class="row back-c">
				<div class="child-title">
				    <a href="mailto:{{ $dataALMa->email }}" class="links white-font">{{ $dataALMa->email }}</a><br>
				    <a href="tel:{{ $dataALMa->phone }}" class="links white-font">{{ $dataALMa->phone }}</a>
				</div>
				<div class="section-buttons">
				    <div class="section-pm">
					<div id="allMem-row{{ $dataALMa->userID }}-child-delno">
					    <img src="/img/delete.png" onclick="delYes('allMem-row{{ $dataALMa->userID }}-child-delno');">
					</div>
				    </div>
				    <div class="section-pm">
					<div id="allMem-row{{ $dataALMa->userID }}-child-sno">
					    <img src="/img/s-yes.png" onclick="sNo('allMem-row{{ $dataALMa->userID }}-child-sno');">
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
