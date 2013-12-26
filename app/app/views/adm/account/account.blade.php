@include('adm.templates.htmlhead')
<body>
<div data-role="page">
    @include('adm.templates.head')
    <div data-role="content">
	<center>
	    <h2 style="margin: 4px;">Account</h2>
	</center>
	<div data-role="controlgroup" data-type="horizontal" data-mini="true">
            <a href="/adm/account/add" data-role="button" data-icon="plus" data-theme="a">Add Account</a>
        </div>
	
	<div data-role="collapsible-set" data-theme="c" data-content-theme="d">
	    @foreach($accounts as $acc)
	    <div data-role="collapsible">
		<h3>{{ $acc->AccName }}</h3>
		<p>
		    ID: {{ $acc->ID }}<br>
		    AccID: {{ $acc->AccID }}<br>
		    AccName: {{ $acc->AccName }}<br>
		    AdminTel: {{ $acc->AdminTel }}<br>
		    AdminEmail: {{ $acc->AdminEmail }}<br>
		    <a href="/adm/account/edit?ID={{ $acc->ID }}">Edit</a> | <!--<a href="#">Delete</a>-->
		    <a href="#popupDialog{{ $acc->ID }}" data-rel="popup" data-position-to="window" data-inline="true" data-transition="pop" data-theme="b">Delete</a>
		</p>
		
	    </div>
	    @endforeach
	</div>
	
    </div>
    
    
    @foreach($accounts as $acc)
	<!-- dialog -->
	<div data-role="popup" id="popupDialog{{ $acc->ID }}" data-overlay-theme="a" data-theme="a" data-dismissible="false" style="max-width:400px;" class="ui-corner-all">
	    <div data-role="header" data-theme="a" class="ui-corner-top">
		<h1>Confirm</h1>
	    </div>
	    <div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
		<p>This action cannot be undone.</p><p>Are you sure want to delete {{ $acc->ID }} and data related to it?</p>
		<a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c">Cancel</a>
		<a href="#" data-role="button" data-inline="true" data-rel="back" data-transition="flow" data-theme="b" id="yesConfirm" onclick="deleteAccount('{{ $acc->ID }}');">Yes</a>
	    </div>
	</div>
	<!-- dialog -->
    @endforeach
    
    <script>
	function deleteAccount(ID)
	{   
	    window.location.href="/adm/account/delete?ID="+ID;
	}
    </script>
</body>
@include('adm.templates.htmlbottom')
