<div class="header">

	<!-- Logo -->
	<div class="header-left">
		<a href="{{route('dashboard')}}" class="logo">
			<img src="{{asset('assets/img/logo.png')}}" alt="" class="header-logo">
		</a>
	</div>
	
	<!-- /Logo -->
	<a id="toggle_btn" href="javascript:void(0);">
		<span class="bar-icon">
			<span></span>
			<span></span>
			<span></span>
		</span>
	</a>
	
	<!-- Header Title -->
   <div class="page-title-box">
		<h3>My Demo Site</h3>
   </div>


	<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

	<!-- Header Menu -->
	<ul class="nav user-menu">
		<li class="nav-item dropdown has-arrow main-drop">
			<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
				<span class="user-img">
				<!-- <span class="status online"></span></span> -->
				<span>{{Auth()->user()->userid}}</span>
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="{{ route('my-profile') }}	">My Profile</a>
				<a class="dropdown-item" href="{{ route('change-password') }}">Change Password</a>
				<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
					</form>
			</div>
		</li>
	</ul>
		<!-- /Header Menu -->

	<!-- Mobile Menu -->
	<div class="dropdown mobile-user-menu">
		<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
			class="fa fa-ellipsis-v"></i></a>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="{{ route('my-profile') }}">My Profile</a>
				<a class="dropdown-item" href="{{ route('change-password') }}">Change Password</a>
				<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
					</form>
			</div>
		</div>
		<!-- /Mobile Menu -->

	</div>