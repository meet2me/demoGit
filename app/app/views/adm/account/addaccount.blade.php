@include('adm.templates.htmlhead')
<body>
<div data-role="page">
    @include('adm.templates.head')
    <div data-role="content">
	<center>
	    <h2 style="margin: 4px;">Account</h2>
	</center>
	<div><a href="/adm/account">Account</a> / Add</div>
	
	<div data-role="fieldcontain">
	    <label for="ID">ID:</label>
	    <input type="text" name="ID" id="ID" placeholder="ID">
	    <span class="error">{{ $errors->first('ID') }}</span>
	</div>
	<div data-role="fieldcontain">
	    <label for="AccID">AccID:</label>
	    <input type="text" name="AccID" id="AccID" placeholder="AccID">
	    <span class="error">{{ $errors->first('ID') }}</span>
	</div>
	<div data-role="fieldcontain">
	    <label for="AccName">AccName:</label>
	    <input type="text" name="AccName" id="AccName" placeholder="AccName">
	    <span class="error">{{ $errors->first('ID') }}</span>
	</div>
	<div data-role="fieldcontain">
	    <label for="AdminTel">AdminTel:</label>
	    <input type="tel" name="AdminTel" id="AdminTel" placeholder="AdminTel">
	    <span class="error">{{ $errors->first('ID') }}</span>
	</div>
	<div data-role="fieldcontain">
	    <label for="AdminEmail">AdminEmail:</label>
	    <input type="email" name="AdminEmail" id="AdminEmail" placeholder="AdminEmail">
	    <span class="error">{{ $errors->first('ID') }}</span>
	</div>
	
	<input type="button" id="submitData" value="Submit" data-role="button" data-inline="true" data-transition="pop" data-theme="b">
    </div>
    
    
    <script>
	$("#submitData").click(function(){
	   var data = "ID="+$("#ID").val()+"&AccID="+$("#AccID").val()+"&AccName="+$("#AccName").val()+"&AdminTel="+$("#AdminTel").val()+"&AdminEmail="+$("#AdminEmail").val();
	   $.post("/adm/account/add",data).done(function(){
	       window.location.href="/adm/account";
	   });
	});
    </script>
</body>
@include('adm.templates.htmlbottom')
