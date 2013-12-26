<div id="body-3" class="tab-body fixed-box back-a">
    <div class="row back-a"  style="border-bottom: 1px solid #888;">
	<div class="ml-15 mr-15 mt-10">
	    <div id="button-1">Change Group</div>
	    <div id="button-2">Save</div>
	</div>
    </div>
    
    <div id="accord-3" class="fixed-box">
	
	<!-- AdmGl -->
	<div id="AdmGl" style="border-bottom: 1px solid #888;">
	    <div id="AdmGl-head">
		<div class="row back-a mb-1">
		    <div class="head-title">
			Admin and Group Leaders
		    </div>
		    <div class="section-buttons">
			<div class="back-a section-pm">
			    <div id="AdmGl-pm">
				<?php 
				//password required & not
				if($need_password == 0 ) { ?>
				<img src="/img/plus.png" onclick="accordShow('AdmGl-body','AdmGl-pm');">
				<?php } else { ?>
				<img src="/img/plus.png" onclick="alert('Password Required. Please login first!');">
				<?php } ?>
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
	    <div id="AdmGl-body" style="display: none;">
		
		@foreach($resAL as $resALa)
		<!-- row1 -->
		<div class="row back-b mb-1">
		    <div class="section-title">
			{{ $resALa->firstname." ".$resALa->lastname }}
		    </div>
		    <div class="section-buttons">
			<div class="section-pm">
			    <div id="AdmGl-row{{ $resALa->userID }}-pm">
				<img src="/img/plus.png" onclick="accordShow('AdmGl-row{{ $resALa->userID }}-child','AdmGl-row{{ $resALa->userID }}-pm');">
			    </div>
			</div>
			<div class="section-pm">
			    <div id="AdmGl-row{{ $resALa->userID }}-check1">
				<img src="/img/unchecked.png" onclick="checkedBtn('AdmGl-row{{ $resALa->userID }}-check1');">
			    </div>
			</div>
			<div class="section-pm">
			    <div id="AdmGl-row{{ $resALa->userID }}-check2">
				<img src="/img/unchecked.png" onclick="checkedBtn('AdmGl-row{{ $resALa->userID }}-check2');">
			    </div>
			</div>
		    </div>
		</div>
		<div id="AdmGl-row{{ $resALa->userID }}-child" style="display: none;" class="mb-1">
		    <div class="row back-c">
			<div class="child-title">
			    <a href="mailto:{{ $resALa->email }}" class="links white-font">{{ $resALa->email }}</a><br>
			    <a href="tel:{{ $resALa->phone }}" class="links white-font">{{ $resALa->phone }}</a>
			</div>
			<div class="section-buttons">
			    <div class="section-pm">
				<div id="AdmGl-row{{ $resALa->userID }}-child-delno">
				    <img src="/img/delete.png" onclick="delNo('AdmGl-row{{ $resALa->userID }}-child-delno');">
				</div>
			    </div>
			    <div class="section-pm">
				<div id="AdmGl-row{{ $resALa->userID }}-child-sno">
				    <img src="/img/s.png" onclick="delNo('AdmGl-row{{ $resALa->userID }}-child-sno');">
				</div>
			    </div>
			</div>
		    </div>
		</div>
		<!-- /row1 -->
		@endforeach
		
		
	    </div>
	    
	</div>
	<!-- /AdmGl -->
	
	<!-- ltMem = Last Ten New Members -->
	<div id="ltMem" style="border-bottom: 1px solid #888;">
	    <div id="ltMem-head">
		<div class="row back-a mb-1">
		    <div class="head-title">
			Last 10 New Members
		    </div>
		    <div class="section-buttons">
			<div class="back-a section-pm">
			    <div id="ltMem-pm">
				<?php 
				//password required & not
				if($need_password == 0 ) { ?>
				<img src="/img/plus.png" onclick="accordShow('ltMem-body','ltMem-pm');">
				<?php } else { ?>
				<img src="/img/plus.png" onclick="alert('Password Required. Please login first!');">
				<?php } ?>
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
	    
	    <div id="ltMem-body" style="display: none;">
		
		@foreach($dataLT as $dataLTA)
		<!-- row1 -->
		<div class="row back-b mb-1">
		    <div class="section-title">
			<?php echo $dataLTA->firstname." ".$dataLTA->lastname; ?>
		    </div>
		    <div class="section-buttons">
			<div class="section-pm">
			    <div id="ltMem-row<?php echo $dataLTA->userID; ?>-pm">
				<img src="/img/plus.png" onclick="accordShow('ltMem-row<?php echo $dataLTA->userID; ?>-child','ltMem-row<?php echo $dataLTA->userID; ?>-pm');">
			    </div>
			</div>
			<div class="section-pm">
			    <div id="ltMem-row<?php echo $dataLTA->userID; ?>-check2">
				<img src="/img/unchecked.png" onclick="checkedBtn('ltMem-row<?php echo $dataLTA->userID; ?>-check2');">
			    </div>
			</div>
			<div class="section-pm">
			    <div id="ltMem-row<?php echo $dataLTA->userID; ?>-check1">
				<img src="/img/unchecked.png" onclick="checkedBtn('ltMem-row<?php echo $dataLTA->userID; ?>-check1');">
			    </div>
			</div>
		    </div>
		</div>
		<div id="ltMem-row<?php echo $dataLTA->userID; ?>-child" style="display: none;" class="mb-1">
		    <div class="row back-c">
			<div class="child-title">
			    <a href="mailto:<?php echo $dataLTA->email; ?>" class="links white-font"><?php echo $dataLTA->email; ?></a><br>
			    <a href="tel:<?php echo $dataLTA->phone; ?>" class="links white-font"><?php echo $dataLTA->phone; ?></a>
			</div>
			<div class="section-buttons">
			    <div class="section-pm">
				<div id="AdmGl-row{{ $resALa->userID }}-child-delno">
				    <img src="/img/delete.png" onclick="delNo('AdmGl-row{{ $resALa->userID }}-child-delno');">
				</div>
			    </div>
			    <div class="section-pm">
				<div id="AdmGl-row{{ $resALa->userID }}-child-sno">
				    <img src="/img/s.png" onclick="delNo('AdmGl-row{{ $resALa->userID }}-child-sno');">
				</div>
			    </div>
			</div>
		    </div>
		</div>
		<!-- /row1 -->
		@endforeach
		
	    </div>
	</div>
	<!-- /LTenMem = Last Ten New Members -->
	

	
	<!-- allMem -->
	<div id="allMem" style="border-bottom: 1px solid #888;">
	    <div id="allMem-head">
		<div class="row back-a mb-1">
		    <div class="head-title">
			Show All Members
		    </div>
		    <div class="section-buttons">
			<div class="back-a section-pm">
			    <div id="allMem-pm">
				<?php 
				//password required & not
				if($need_password == 0 ) { ?>
				<img src="/img/plus.png" onclick="accordShow('allMem-body','allMem-pm');">
				<?php } else { ?>
				<img src="/img/plus.png" onclick="alert('Password Required. Please login first!');">
				<?php } ?>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	    
	    <div id="allMem-body" style="display: none;">
		
		@foreach($dataALM as $dataALMA)
		<!-- row1 -->
		<div class="row back-b mb-1">
		    <div class="section-title">
			{{ $dataALMA->firstname." ".$dataALMA->lastname }}
		    </div>
		    <div class="section-buttons">
			<div class="section-pm">
			    <div id="allMem-row<?php echo $dataALMA->userID; ?>-pm">
				<img src="/img/plus.png" onclick="accordShow('allMem-row<?php echo $dataALMA->userID; ?>-child','allMem-row<?php echo $dataALMA->userID; ?>-pm');">
			    </div>
			</div>
			<div class="section-pm">
			    <div id="allMem-row<?php echo $dataALMA->userID; ?>-check2">
				<img src="/img/unchecked.png" onclick="checkedBtn('allMem-row<?php echo $dataALMA->userID; ?>-check2');">
			    </div>
			</div>
			<div class="section-pm">
			    <div id="allMem-row<?php echo $dataALMA->userID; ?>-check1">
				<img src="/img/unchecked.png" onclick="checkedBtn('allMem-row<?php echo $dataALMA->userID; ?>-check1');">
			    </div>
			</div>
		    </div>
		</div>
		<div id="allMem-row<?php echo $dataALMA->userID; ?>-child" style="display: none;" class="mb-1">
		    <div class="row back-c">
			<div class="child-title">
			    <a href="mailto:<?php echo $dataALMA->email; ?>" class="links white-font"><?php echo $dataALMA->email; ?></a><br>
			    <a href="tel:<?php echo $dataALMA->phone; ?>" class="links white-font"><?php echo $dataALMA->phone; ?></a>
			</div>
			<div class="section-buttons">
			    <div class="section-pm">
				<div id="AdmGl-row{{ $resALa->userID }}-child-delno">
				    <img src="/img/delete.png" onclick="delNo('AdmGl-row{{ $resALa->userID }}-child-delno');">
				</div>
			    </div>
			    <div class="section-pm">
				<div id="AdmGl-row{{ $resALa->userID }}-child-sno">
				    <img src="/img/s.png" onclick="delNo('AdmGl-row{{ $resALa->userID }}-child-sno');">
				</div>
			    </div>
			</div>
		    </div>
		</div>
		<!-- /row1 -->
		@endforeach
		
	    </div>
	</div>
	<!-- /allMem -->
	
	
	<!-- leave -->
	<div id="leave" style="border-bottom: 1px solid #888;">
	    <div id="leave-head">
		<div class="row back-a mb-1">
		    <div class="head-title">
			Last 10 Members to Leave
		    </div>
		    <div class="section-buttons">
			<div class="back-a section-pm">
			    <div id="leave-pm">
				<?php 
				//password required & not
				if($need_password == 0 ) { ?>
				<img src="/img/plus.png" onclick="accordShow('leave-body','leave-pm');">
				<?php } else { ?>
				<img src="/img/plus.png" onclick="alert('Password Required. Please login first!');">
				<?php } ?>
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	    
	    <div id="leave-body" style="display: none;">
			
		<?php 
		$c = 0;
		while($c < 10 ) { 
		$c = $c + 1;
		?>
		<!-- row1 -->
		<div class="row back-b mb-1">
		    <div class="section-title">
			John Wilson <?php echo $c; ?>
		    </div>
		    <div class="section-buttons">
			<div class="section-pm">
			    <div id="leave-row<?php echo $c; ?>-pm">
				<img src="/img/plus.png" onclick="accordShow('leave-row<?php echo $c; ?>-child','leave-row<?php echo $c; ?>-pm');">
			    </div>
			</div>
			<div class="section-pm">
			    <div id="leave-row<?php echo $c; ?>-check2">
				<img src="/img/unchecked.png" onclick="checkedBtn('leave-row<?php echo $c; ?>-check2');">
			    </div>
			</div>
			<div class="section-pm">
			    <div id="leave-row<?php echo $c; ?>-check1">
				<img src="/img/unchecked.png" onclick="checkedBtn('leave-row<?php echo $c; ?>-check1');">
			    </div>
			</div>
		    </div>
		</div>
		<div id="leave-row<?php echo $c; ?>-child" style="display: none;" class="mb-1">
		    <div class="row back-c">
			<div class="child-title">
			    <a href="mailto:john.wilson<?php echo $c; ?>@yahoo.co.uk" class="links white-font">john.wilson<?php echo $c; ?>@yahoo.co.uk</a><br>
			    <a href="tel:+447788990<?php echo $c; ?>" class="links white-font">+447788990<?php echo $c; ?></a>
			</div>
			<div class="section-buttons">
			    <div class="section-pm">
				<div id="AdmGl-row{{ $resALa->userID }}-child-delno">
				    <img src="/img/delete.png" onclick="delNo('AdmGl-row{{ $resALa->userID }}-child-delno');">
				</div>
			    </div>
			    <div class="section-pm">
				<div id="AdmGl-row{{ $resALa->userID }}-child-sno">
				    <img src="/img/s.png" onclick="delNo('AdmGl-row{{ $resALa->userID }}-child-sno');">
				</div>
			    </div>
			</div>
		    </div>
		</div>
		<!-- /row1 -->
		<?php } ?>
		
	    </div>
	</div>
	<!-- /leave -->
    </div>

    <div class="row back-a">
	<div class="section-buttons">
	    <div id="button-3">Save</div>
	</div>
    </div>
    <div class="back-a">
	<center>
	    *Lorem ipsum sit amet
	</center>
    </div>
   
</div>