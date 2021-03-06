<!--preloading-->
<div id="preloader">
    <img class="logo" src="{{asset('frontend/images/logo1.png')}}" alt="" width="119" height="58">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->
<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="#"><img class="logo" src="{{asset('frontend/images/logo1.png')}}" alt="" width="119" height="58"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1">
							Home
							</a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" href="{{ route('movie.public') }}">
							Film
							</a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" href="{{ route('nonton.public') }}">
							Jadwal film
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav flex-child-menu menu-right"> 	              
						@guest
							@if (Route::has('login'))
								<li><a href="/login">LOG In</a></li>
							@endif

							@if (Route::has('register'))
								<li class="btn"><a href="/register">sign up</a></li>
							@endif
						@else

							@if (Auth::user()->is_admin == 1)
								<li><a href="/admin">Admin Dashboard</a></li>
							@else
								<li><a href="/list-order">List Order</a></li>
							@endif
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							{{ Auth::user()->name }}<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
								<li>
									<a class="dropdown-item" href="{{ route('logout')}}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
									{{ __('Logout') }}
									</a>
									
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</li>
							</ul>
						</li>
					@endguest
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	</div>
</header>