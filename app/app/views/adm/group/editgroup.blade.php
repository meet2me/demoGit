@include('adm.templates.htmlhead')
<body>
<div data-role="page">
    @include('adm.templates.head')
    <div data-role="content">
	<center>
	    <h2 style="margin: 4px;">Group</h2>
	</center>
	<div><a href="/adm/group">Group</a> / Edit</div>
	{{ Form::open(array('url'=>'/adm/group/edit?idx='.$group->idx)) }}
	    <div data-role="fieldcontain">
		<label for="ID">ID:</label>
		
		<select name="ID" id="ID">
		    <option value="{{ $group->ID }}">{{ $group->ID }}</option>
		    
		</select>
		
		<span class="error">{{ $errors->first('ID') }}</span>
	    </div>
	
	    <div data-role="fieldcontain">
		<label for="GroupID">GroupID:</label>
		<input type="text" name="GroupID" id="GroupID" value="{{ $group->GroupID }}" placeholder="GroupID">
		<span class="error">{{ $errors->first('GroupID') }}</span>
	    </div>
	
	    <div data-role="fieldcontain">
		<label for="Group">Group:</label>
		<input type="text" name="Group" id="Group" value="{{ $group->Group }}" placeholder="Group">
		<span class="error">{{ $errors->first('Group') }}</span>
	    </div>

	    <div data-role="fieldcontain">
		<label for="PassRequired">PassRequired:</label>
		<select name="PassRequired">
		    <option value="">
			[ PassRequired ]
		    </option>
		    <option value="1" <?php if($group->idx == '1') : echo "selected"; endif; ?>>
			Yes
		    </option>
		    <option value="0" <?php if($group->idx == '0') : echo "selected"; endif; ?>>
			No
		    </option>
		</select>
	    </div>
	    
	    <div data-role="fieldcontain">
		<input type="submit" value="Submit">
	    </div>
	</form>
    </div>
</body>
@include('adm.templates.htmlbottom')
