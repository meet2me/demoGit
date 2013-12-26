@include('adm.templates.htmlhead')
<body>
<div data-role="page">
    @include('adm.templates.head')
    <div data-role="content">
	<center>
	    <h2 style="margin: 4px;">Account</h2>
	</center>
	<div><a href="/adm/account">Account</a> / Edit</div>
	
	<div data-role="fieldcontain">
	    <label for="ID">ID:</label>
	    <input type="text" name="ID" id="ID" value="{{ $acc->ID }}" placeholder="ID">
	    <span class="error">{{ $errors->first('ID') }}</span>
	</div>
	<div data-role="fieldcontain">
	    <label for="AccID">AccID:</label>
	    <input type="text" name="AccID" id="AccID" placeholder="AccID" value="{{ $acc->AccID }}">
	    <span class="error">{{ $errors->first('ID') }}</span>
	</div>
	<div data-role="fieldcontain">
	    <label for="AccName">AccName:</label>
	    <input type="text" name="AccName" id="AccName" placeholder="AccName" value="{{ $acc->AccName }}">
	    <span class="error">{{ $errors->first('ID') }}</span>
	</div>
	<div data-role="fieldcontain">
	    <label for="AdminTel">AdminTel:</label>
	    <input type="tel" name="AdminTel" id="AdminTel" placeholder="AdminTel" value="{{ $acc->AdminTel }}">
	    <span class="error">{{ $errors->first('ID') }}</span>
	</div>
	<div data-role="fieldcontain">
	    <label for="AdminEmail">AdminEmail:</label>
	    <input type="email" name="AdminEmail" id="AdminEmail" placeholder="AdminEmail" value="{{ $acc->AdminEmail }}">
	    <span class="error">{{ $errors->first('ID') }}</span>
	</div>
	
	<a href="#popupDialog" data-rel="popup" data-position-to="window" data-role="button" data-inline="true" data-transition="pop" data-theme="b">Submit</a>
    </div>
    
    <!-- dialog -->
    <div data-role="popup" id="popupDialog" data-overlay-theme="a" data-theme="a" data-dismissible="false" style="max-width:400px;" class="ui-corner-all">
	<div data-role="header" data-theme="a" class="ui-corner-top">
	    <h1>Confirm</h1>
	</div>
	<div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
	    <h3 class="ui-title">This action will update ID for all table related to table relation scheme.</h3>
	    <p>This action cannot be undone.</p>
	    <a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c">Cancel</a>
	    <a href="#" data-role="button" data-inline="true" data-rel="back" data-transition="flow" data-theme="b" id="yesConfirm">Yes</a>
	</div>
    </div>
    <!-- dialog -->
    
    <script>
	$("#yesConfirm").click(function(){
	   var data = "ID="+$("#ID").val()+"&AccID="+$("#AccID").val()+"&AccName="+$("#AccName").val()+"&AdminTel="+$("#AdminTel").val()+"&AdminEmail="+$("#AdminEmail").val();
	   $.post("/adm/account/edit",data).done(function(){
	       window.location.href="/adm/account";
	   });
	});
    </script>
</body>
@include('adm.templates.htmlbottom')
