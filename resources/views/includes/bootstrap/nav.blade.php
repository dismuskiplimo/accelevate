<ul class="nav navbar-nav">
	<li ><a href="{{ route('homepage') }}">Home</a></li>
</ul>

<ul class="nav navbar-nav navbar-right">
	
	@if(auth()->check())
		<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
		@if(auth()->user()->is_student())
			<li><a href="{{ route('student.groups') }}">Groups</a></li>
		@elseif(auth()->user()->is_staff())
			<li><a href="{{ route('staff.groups') }}">Groups</a></li>
		@endif
		

		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
				<img src="{{ profile_thumb(auth()->user()->thumb_url) }}" alt="" class="size-30 img-circle" style="margin-right:10px; margin-top:-3px">
				{{ auth()->user()->name }} <span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li><a href="{{ route('dashboard') }}">Dashboard</a></li>
				<li><a href="{{ route('user.profile.about') }}">About Me</a></li>
				<li><a href="{{ route('user-profile') }}">My Profile</a></li>
				<li><a href="{{ route('logout') }}">Logout</a></li>
			</ul>
		</li>
	@else
		<li ><a href="{{ route('register') }}">Register</a></li>
		<li ><a href="{{ route('login') }}">Login</a></li>
	@endif
</ul>