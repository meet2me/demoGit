	<div id="leave" style="border-bottom: 1px solid #888;">
	    <div id="leave-head">
		<div class="row back-a">
		    <div class="head-title">
			Last 10 Members to Leave
		    </div>
		    <div class="section-buttons">
			<div class="back-a section-pm">
			    <div id="leave-pm">
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
						?><img src="/img/plus.png"><?php
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
				    ?><img src="/img/plus.png" onclick="alert('You are not logged in');"><?php
				}
				?>
				
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	    <div id="leave-body" style="display: none;">
		
	    </div>
	</div>
