<div id="body-1" class="tab-body fixed-box">
    <div id="bod1-row1" class="pad15 back-a font13">
	<div style="background-color: #888; display: table; padding: 5px 10px;">
	    Change Group
	</div>
    </div>
    <div id="bod1-row2" class="pad15 back-a font13 justify">
	We will send you a maximum of 10 automated emails (no SMS at this stage) to tell you about our plans for GroupMessage. You can stop message at any time by clicking a link at the bottom of every email.
    </div>
    {{ Form::open(array('url'=>'x/join_do')) }}
	<div id="inputs" class="pad15 back-a font12">
	    <!-- current group -->
	    <div style="display: none;">
		<input type="text" value="{{ $groupA->GroupID }}" name="group">
	    </div>
	    <!-- current group -->
	    <div class="row">
		<input type="text" name="firstname" placeholder="First Name" class="fixed-box">
	    </div>
	    <div class="row">
		<input type="text" name="lastname" placeholder="Last Name" class="fixed-box">
	    </div>
	    <div class="row">
		<input type="text" name="email" placeholder="Email Address" class="fixed-box">
	    </div>
	    <div class="row">
		<input type="text" name="phone" placeholder="Cell / Mobile" class="fixed-box">
	    </div>
	    <!--
	    <div class="row">
		<input type="password" name="password" placeholder="Password" class="fixed-box">
	    </div>
	    -->
	    <div class="row">
		* Enter mobile number in international format<br>
		&nbsp;&nbsp;&nbsp;Eg: UK +4412345678 USA +12212345678
	    </div>
	    <div class="row">
		<center>
		    <input type="submit" value="JOIN GROUP" class="button-join-leave">
		</center>
	    </div>
	    <div class="row">
		<center>
		    <input type="submit" value="LEAVE GROUP" class="button-join-leave" disabled="disabled">
		</center>
	    </div>
	</div>
    </form>
</div>