@include('adm.templates.htmlhead')
<body>
<div data-role="page">
    @include('adm.templates.head')
    <div data-role="content">
	<center>
	    <h2 style="margin: 4px;">Account</h2>
	</center>
	<div data-role="controlgroup" data-type="horizontal" data-mini="true">
            <a href="/adm/group/add" data-role="button" data-icon="plus" data-theme="a">Add Group</a>
        </div>
	
	<div data-role="collapsible-set" data-theme="c" data-content-theme="d">
	    @foreach($accounts as $account)
	    <div data-role="collapsible">
		<h3>{{ $group->AccName }}</h3>
		<p>
		    ID: {{$account->ID }}
		    AccID: {{ $account->AccID }}<br>
		    AccName: {{ $account->AccName }}<br>
		    AdminTel: {{ $account->AdminTel }}<br>
		    AdminEmail: {{ $account->AdminEmail }}<br>
		    <a href="/adm/account/edit?idx={{ $account->ID }}">Edit</a> | <a href="#">Delete</a>
		</p>
	    </div>
	    @endforeach
	</div>
    </div>
</body>
@include('adm.templates.htmlbottom')
