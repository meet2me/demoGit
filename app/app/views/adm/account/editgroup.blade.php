@include('adm.templates.htmlhead')
<body>
<div data-role="page">
    @include('adm.templates.head')
    <div data-role="content">
	<center>
	    <h2 style="margin: 4px;">Group</h2>
	</center>
	<div><a href="/adm/group">Group</a> / Edit</div>
	{{ Form::open(array('url'=>'/adm/group/edit')) }}
	    <input name="idx" value="{{ $group->idx }}" style="display: none;">
	    <input name="ID" placeholder="ID" value="{{ $group->ID }}">
	    <input name="GroupID" placeholder="GroupID" value="{{ $group->GroupID }}">
	    <input name="Group" placeholder="Group" value="{{ $group->Group }}">
	    <select name="PassRequired">
		<option value="">
		    [ Password Required? ]
		</option>
		<option value="1" <?php if($group->idx == '1') : echo "selected"; endif; ?>>
		    Yes
		</option>
		<option value="0" <?php if($group->idx == '0') : echo "selected"; endif; ?>>
		    No
		</option>
	    </select>
	    <input type="submit" value="Submit">
	</form>
    </div>
</body>
@include('adm.templates.htmlbottom')
