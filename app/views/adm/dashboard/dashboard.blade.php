@include('adm.templates.htmlhead')
<body>
<div data-role="page">
    @include('adm.templates.head')
    <div data-role="content">
	<a data-role="button" href="/adm/account">
            Manage Account
        </a>
	<a data-role="button" href="/adm/group">
            Manage Group
        </a>
	<a data-role="button" href="/adm/user">
            Manage User
        </a>
    </div>
</body>
@include('adm.templates.htmlbottom')
