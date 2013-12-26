
    {{ Form::open(array('url'=>'adm/dologin')) }}
    <!-- <form action="login_do" method="post">-->
    <div>
	<input type="text" name="email" id="email" placeholder="Email">
    </div>
    <div>
	<input type="password" name="password" id="password" placeholder="Password">
    </div>
    <div>
	<input type="submit" name="submit" id="submit" value="Submit" data-inline="true">
    </div>
    {{ Form::close() }}



