<div id="body-3" class="tab-body fixed-box back-a" style="display: none;">
     <div>
	<?php
	if(!Auth::check())
	{
	    ?>
	    <style>
		#formLoginBod3 { padding: 15px; }
		#formLoginBod3 input { width: 100%; }
	    </style>
	    <div id="formLoginBod3">
		<div class="row">
		    <input type="email" name="three_email" id="three_email" placeholder="Email Address" class="fixed-box">
		</div>
		<div class="row">
		    <input type="password" name="three_password" id="three_password" placeholder="Password" class="fixed-box">
		</div>
		<div class="row">
		    <input type="submit" value="Submit" class="back-c" style="color: #fff;" onclick="loginGroupBodThree('{{ $ID }}','{{ $GroupID }}');">
		</div>
	    </div>
	    <?php
	}
	?>
    </div>
    
    <div id="accord-3" class="fixed-box">
	
	<!-- AdmGl -->
	@include('v0.tabpage.body3_ANGL')
	<!-- /AdmGl -->
	
	<!-- Last 10 New Members -->
	@include('v0.tabpage.body3_LTNM')
	<!-- /Last 10 New Membrs -->
	
	<!-- Last 10 Members to Leave -->
	@include('v0.tabpage.body3_LTMTL')
	<!-- /Last 10 Members to Leave -->
	
	<!-- Other Current Members -->
	@include('v0.tabpage.body3_OCM')
	<!-- /Other Current Members -->
	
	<!-- Show All Members -->
	@include('v0.tabpage.body3_SAM')
	<!-- /Show All Members -->
	
	
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