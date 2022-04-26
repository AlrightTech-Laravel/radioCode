<header>
		<div id="logo">
			<a href="{{route('home')}}">GetMyRadioCode</a>
		</div>
		<div class="col-md-12 col-sm-12">
			<a id="megamenu-button-mobile" href="#"></a><!-- Menu button responsive-->
			<nav class="megamenu_container">
			<ul class="megamenu">
				<li><a href="#" class="drop-down">Radio Codes</a>
				<!-- Begin dropdown -->
				<div class="drop-down-container">
					<div class="container">
						<ul class="row">
							@foreach($brands as $each)
							<li class="col-md-3 col-sm-4 col-xs-12" style="margin-top:25px">
							<div class="menu-item">
								<a href="{{route('radio-code-order.show', $each)}}" title="">
									<div>
										<img src="{{$each->logo_url}}" alt="" class="img-responsive header-menu-img"/>
									</div>
									<div class="text-left" style="margin-top: 15px">
										<h3>{{$each->name}}</h3>
									</div>
								</a>
							</div><!-- End menu item -->
							@endforeach
						</ul>
					</div><!-- End container -->
				</div><!-- End dropdown -->
				</li><!-- End Item -->
				<li><a href="#" title="About">About Us</a></li>
				<li><a href="{{route('ContactUs')}}" title="Contacts">Contact Us</a></li>
			</ul>
			</nav>
		</div> <!-- End col lg 12 -->
	<div id="header_shadow"></div>
	</header>