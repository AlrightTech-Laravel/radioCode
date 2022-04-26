<section class="section is-white is-none-all">
	<div class="container is-fluid">
		<nav class="navbar" role="navigation" aria-label="main navigation">
			<div class="navbar-menu">
				<div class="navbar-start" style="justify-content: flex-start;">
				<a role="button" class="navbar-burger jb-aside-mobile-toggle" data-target="sidebar-menu" aria-label="menu" aria-expanded="false">
					<div class="icon is-large"><i class="mdi mdi-menu"></i></div>
				</a>
				</div>
			</div>
			<div class="logo navbar-item">
				<a href="{{route('home')}}" title="Homepage | OnlineRadioCodes.co.uk">
				<img class="logo-img" src="{{asset('assets/img/orc-inverse-logo-black.png')}}" alt="Logo">
				</a>
			</div>
			<div class="navbar-menu navbar-menu-end">
				<div class="navbar-end">
				<div class="navbar-item has-dropdown is-hoverable is-hidden-desktop">
					<a class="button is-black is-outlined">Contact</a>
					@include('website.layout.mobile-header-contact')
				</div>
				</div>
			</div>
		</nav>
	</div>
</section>