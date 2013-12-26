@include('adm.templates.htmlhead')
<body>
<div data-role="page">
    @include('adm.templates.head')
    <div data-role="content">
	<center>
	    <h2 style="margin: 4px;">Group</h2>
	</center>
	<div data-role="controlgroup" data-type="horizontal" data-mini="true">
            <a href="/adm/group/add" data-role="button" data-icon="plus" data-theme="a">Add Group</a>
        </div>
	
	<div data-role="collapsible-set" data-theme="c" data-content-theme="d">
	    @foreach($groups as $group)
	    <div data-role="collapsible">
		<h3>{{ $group->Group }}</h3>
		<p>
		    ID: {{ $group->ID }}<br>
		    Group ID: {{ $group->GroupID }}<br>
		    <a href="/adm/group/edit?idx={{ $group->idx }}">Edit</a> | <a href="/v1/{{ $group->ID }}/{{ $group->GroupID }}" target="blank">To Group</a> | <a href="#">Delete</a>
		</p>
	    </div>
	    @endforeach
	</div>
    </div>
</body>
@include('adm.templates.htmlbottom')
