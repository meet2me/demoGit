@include('adm.templates.htmlhead')
<body>
<div data-role="header" data-position="fixed">
    <h1>Panel Login</h1>
</div>
<div data-role="content"> 
    @if (Session::has('login_errors'))
	<span class="error alert">Wrong email or password</span>
    @endif
    <div>
	<input type="text" name="email" id="email" placeholder="Email">
    </div>
    <div>
	<input type="password" name="password" id="password" placeholder="Password">
    </div>
    <div>
	<button id="submit_button">Submit</button>
    </div>
    
</div>
<script>

$("#submit_button").click(function(){
    //var data = '{"email":"'+$("#email").val()+'","password":"'+$("#password").val()+'"}';
    var data = "email="+$("#email").val()+"&password="+$("#password").val();
   
   /*
    $.post('adm/dologin', data).done(function(){
	//window.location.href="/adm/dashboard";
	alert("done");
    });
    */
    
   window.location.href = "/adm/dologin?"+data;
});
</script>
</body>
@include('adm.templates.htmlbottom')
