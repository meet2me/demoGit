@include('adm.templates.htmlhead')
<body>
<div data-role="page">
    @include('adm.templates.head')
    <div data-role="content">
	<center>
	    <h2 style="margin: 4px;">Group</h2>
	</center>
	<div><a href="/adm/group">Group</a> / Add</div>
	{{ Form::open(array('url'=>'/adm/group/add')) }}
	    <div>
		{{ Form::text('ID',Input::old('ID'),array('placeholder'=>'ID')) }}
		<span class="error">{{ $errors->first('ID') }}</span>
	    </div>
	    <div>
		{{ Form::text('GroupID',Input::old('GroupID'),array('placeholder'=>'GroupID')) }}
		<span class="error">{{ $errors->first('GroupID') }}</span>
	    </div>
	    <div>
		{{ Form::text('Group',Input::old('Group'),array('placeholder'=>'Group')) }}
		<span class="error">{{ $errors->first('Group') }}</span>
	    </div>
	    <select name="PassRequired">
		<option value="">
		    [ Password Required? ]
		</option>
		<option value="1">
		    Yes
		</option>
		<option value="0">
		    No
		</option>
	    </select>
	    <input type="submit" value="Submit">
	</form>
    </div>
</body>
@include('adm.templates.htmlbottom')
