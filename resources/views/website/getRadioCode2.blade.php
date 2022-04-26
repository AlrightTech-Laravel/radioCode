@extends('website.layout.layout')
@section('header_content')
@endsection
@section('content')

	@if(isset($manufacturer) && $manufacturer->count() == 1)
	<section class="main" itemscope="" itemtype="https://schema.org/Product">
		<div class="turn-off-the-lights"></div>
		<div class="wrap-it-up">
			<ol class="breadcrumbs">
				<li>
					<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
						<a href="{{route('home')}}" title="Home" itemprop="url"
						><span itemprop="title">Home</span></a><i class="fa fa-chevron-right" aria-hidden="true"></i>
					</span>
				</li>
				<li>
					<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
						<a href="#" title="{{$manufacturer[0]->manufacturer_category->name}}" itemprop="url"
						><span itemprop="title">{{$manufacturer[0]->manufacturer_category->name}} Radio Codes</span></a>
					</span>
				</li>
			</ol>
		</div>
		<div class="wrap-it-up page">
			<div class="title-wrapper">
				<img
					itemprop="image"
					class="trans-logo half"
					src="{{$manufacturer[0]->brand->logo_url}}"
					alt="{{$manufacturer[0]->brand->name}} Radio Unlock Codes"
				>
				<h1
					data-type-get="title"
					class="getElem"
					itemprop="name"
				>{{$manufacturer[0]->brand->name}} Radio Codes</h1>
				<span class="title-wrapper-mid-text"> From </span>
				<span class="orc-orange">${{$manufacturer[0]->price}}</span>
			</div>
			<div
				class="small-seconday"
				itemprop="description"
			><b class="orc-orange">
					<h2> {{$manufacturer[0]->brand->name}} Radio Code </h2>
				</b> decoding service, radio's unlocked online via serial number.
				<span class="orc-orange">Over 250,000 customers served.</span> Available:
				<span class="times">Today 9am to 7pm.</span>
				<span class="after"> Orders after are delivered next day.</span>
			</div>
			<div
				class="buy-box-container"
				itemprop="offers"
				itemscope=""
				itemtype="https://schema.org/Offer"
			>
				<meta
					itemprop="priceCurrency"
					content="GBP"
				>
				<meta
					itemprop="price"
					content="9.99"
				>
				<meta
					itemprop="availability"
					content="https://schema.org/InStock"
				>
				<ul class="points">
					<li>
						<i class="fa fa-trophy"></i> Award Winning Service.
					</li>
					<li>
						<i class="fa fa-users"></i> 250,000+ Happy Customers.
					</li>
					<li>
						<i class="fa fa-star"></i> 100% Money Back Guarantee.
					</li>
					<li>
						<i class="fa fa-shield"></i> Expert's On Hand To Help.
					</li>
				</ul>
			</div>
		</div>
	</section>
	<section class="seperator ">
		<div class="wrap-it-up pd10">
			<h2>How To Get My {{$manufacturer[0]->brand->name}} Radio Code</h2>
			<div class="selling-points">
				<div class="mb20">
					@if(isset($manufacturer) && $manufacturer->count() > 0)
						@foreach($manufacturer as $each)
							<div class="dib">
								<h1>{{$each->title}}</h1>
								<p class="lead">
									{{$each->brand->name}}
								</p>
								<div class="info">
									{!! $each->description !!}
								</div>
							</div>
						@endforeach
					@endif
				</div>
				<div class="widge mt2 pd10">
					<div>
						<span>Examples of Alfa Romeo Radio's.</span>
					</div>
					<div class="tut-pic frd">
						@if(isset($manufacturer))
							@foreach($manufacturer as $each)
							<figure>
								<img
									src="{{$each->image_url}}"
									alt="{{$each->title}}"
									style="width: 100%;"
								>
								<figcaption>
									<p>{{$each->title}}</p>
								</figcaption>
							</figure>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	@elseif(isset($manufacturer) && $manufacturer->count() > 1)
		<section class="seperator-top">
			<div class="wrap-it-up">
				<ol class="breadcrumbs">
					<li>
						<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="{{route('home')}}" title="Home" itemprop="url"
							><span itemprop="title">Home</span></a><i class="fa fa-chevron-right" aria-hidden="true"></i>
						</span>
					</li>
					<li>
						<span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="#" title="{{$manufacturer[0]->manufacturer_category->name}}" itemprop="url"
							><span itemprop="title">{{$manufacturer[0]->manufacturer_category->name}} Radio Codes</span></a>
						</span>
					</li>
				</ol>
			</div>
			<div class="wrap-it-up white step-by-step">
				<div class="page-title">
					<img style="width:65px" class="trans-logo new-p" src="{{$manufacturer[0]->brand->logo_url}}" alt="{{$manufacturer[0]->brand->name}} Radio Radio Codes">
					<div>
						<h1 class="h2 nissan getElem" data-type-get="title"> {{$manufacturer[0]->brand->name}} Radio Codes</h1>
					</div>
				</div>
				<div style="margin-bottom: 15px;">
					<p>{{$manufacturer[0]->brand->name}} radio code online service <strong>24 hours a day 7 days a week</strong>. We guarantee
						all our radio decodes, that’s why we are the UK's No.1 radio code company and offer a
						<strong>100% money back guarantee!</strong></p>
				</div>
				<div class="price-banner">
					<small>FROM</small>
					<span>${{$manufacturer[0]->price}}</span>
				</div>
				<div class="stepper-card" id="step-cont">
					<ul id="step-tabs">
						<li class="active">
							<a href="#tab-1">
								<h3 data-content="Find My Serial">How To Find My Serial</h3>
							</a>
						</li>
						<li id="grc">
							<a class="get-code" href="#tab-2">
								<h3 id="get-radio-code">Get My Radio Code</h3>
							</a>
						</li>
						<li>
							<a href="#tab-3">
								<h3 data-content="Enter My Code">How to Enter My Code</h3>
							</a>
						</li>
					</ul>
					<div class="step-content">
						<h3 rel="tab-1">Find My Serial</h3>
						<div class="page-draw" id="tab-1" >
							@foreach($manufacturer as $each)
								<section>
									<div class="widge">
										<div class="info nrc">
											<h2>{{$each->title}}</h2>
											{!! $each->description !!}
											<a class="req-btn" href="#tab-2"><i class="fa fa-arrow-right"></i> Get Code</a>
										</div>
										<div class="exp">
											<div class="tut-vid">
												<img src="{{$each->image_url}}" alt="{{$each->title}}" style="width: 100%;">
											</div>
										</div>
									</div>
								</section>
							@endforeach
						</div>
						<h3 rel="tab-2">Get My Radio Code</h3>
						<div class="page-draw" id="tab-2" >
							<div class="get-code-page">
								<span class="input-label-content mb20">Choose your radio type:</span>
								<div class="get-form">
									<span class="input">
										<div class="flex nsn js-accordion">
											@foreach($manufacturer as $each)
											<span class="accordion--menu__button product__accordion-btn">
												<span><span>{{$each->title}}</span>
													<span class="price__pill">${{$each->price}}</span>
												</span>
												<i class="fa fa-caret-right" aria-hidden="true"></i>
											</span>
											<div class="accordion--menu product__accordion-content">
												<img src="{{$each->image_url}}" alt="{{$each->title}}">
												<form class="buy-box" action="{{route('radio-code-order.GetSerialInfo', $each->id)}}" method="post" accept-charset="utf-8" novalidate="" data-value="1">
													@csrf
													<span class="input">
														<label class="input-label" data-content="Enter Serial Number" for="radio-serial">
															<span class="input-label-content">*Enter Serial Number</span>
														</label>
														<input placeholder="BP538971317615" data-type-get="serial-1" class="input-field i getElem radio-serial" name="serial_number" id="serial_number" required="" type="text" required>
														<input type="hidden" value="{{$each->id}}" name="manufacturer_id" required>
													</span>
													<span class="field">
														<button type="submit" class="buy-btn nissan-buy-btn buyCode">
															<i class="fa fa-unlock-alt"></i>
															<span>Get Unlock Code</span>
														</button>
														<span class="scr-checkout__main-pgs -nissan"><img
																class="scr-icon"
																src="{{asset('assets/img/lock-secure.png')}}"
																alt="Secure Checkout"
															><span>SECURE CHECKOUT</span></span>
													</span>
												</form>
											</div>
											@endforeach
										</div>
									</span>
								</div>
								<ul class="seller-card">
									<li>
										<i
											class="fa fa-star"
											aria-hidden="true"
										></i>
										<span>UK's No.1 Radio Decoding Company</span>
									</li>
									<li>
										<i
											class="fa fa-star"
											aria-hidden="true"
										></i><span>Over 250,000 Customers Served</span>
									</li>
									<li> <i
											class="fa fa-star"
											aria-hidden="true"
										></i> <span>Lifetime <strong>Free</strong> Radio Code Retrieval</span></li>
									<li>
										<i
											class="fa fa-star"
											aria-hidden="true"
										></i>
										<span>Experts on Hand to Help</span>
									</li>
									<li>
										<i
											class="fa fa-star"
											aria-hidden="true"
										></i>
										<span>Over 65% Cheaper than the Dealership</span>
									</li>
									<li class="revs">
										<div
											class="seller-banner-new  modal-button"
											data-popup="tp"
										>
											<span class="seller-banner-reviews logo-wrap rv-logo-wrap">
												<img
													src="img/trustpilot.svg"
													alt=""
												>
											</span>
											<span class="seller-banner-reviews stars-wrap rv-stars-wrap">
												<img
													src="img/Trustpilot_ratings_5star-RGB.svg"
													alt="Trustpilot Rating"
												>
											</span>
											<div class="seller-banner-reviews-under">
												<div><span
														id="rvScore"><b>4.7&nbsp;</b></span><b><span>/&nbsp;5</span></b>&nbsp;|&nbsp;
												</div>
												<div><span
														id="rvReviews"><b>16,350</b>&nbsp;</span><span>reviews</span>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<h3 rel="tab-3">How to Enter My Code</h3>
						<div class="page-draw" id="tab-3" >
							@foreach($manufacturer as $each)
								<h5>{{$each->title}}</h5>
								{!! $each->how_it_works !!}
							@endforeach

						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="seperator">
			<div class="wrap-it-up">
				<div class="popular-code__split">
					<div class="popular-code__left popular-code__box card">
						<h3 class="h5">Popular Nissan Radio Codes</h3>
						<ul>
							<li><a href="nissan-almera-radio-codes.html">Almera</a></li>
							<li><a href="nissan-juke-radio-codes.html">Juke</a></li>
							<li>Kubistar</li>
							<li><a href="nissan-qashqai-radio-codes.html">Qashqai</a></li>
							<li><a href="nissan-micra-radio-codes.html">Micra</a></li>
							<li><a href="nissan-navara-radio-codes.html">Navara</a></li>
							<li><a href="nissan-note-radio-codes.html">Note</a></li>
							<li><a href="nissan-nv200-radio-codes.html">NV200</a></li>
							<li>NV300</li>
							<li>Pixo</li>
							<li><a href="nissan-primastar-radio-codes.html">Primastar</a></li>
							<li>Pulsar</li>
							<li><a href="nissan-x-trail-radio-codes.html">X-Trail</a></li>
							<li>350Z</li>
						</ul>
					</div>
					<div class="popular-code__right popular-code__box card">
						<h3 class="h5">Popular Nissan Radio Models</h3>
						<ul>
							<li><a href="nissan-connect-bosch-lcn-eu-radio-codes.html">Connect</a></li>
							<li><a href="nissan-daewoo-radio-codes.html">Daewoo</a></li>
							<li><a href="nissan-clarion-radio-codes.html">Clarion</a></li>
							<li><a href="nissan-blaupunkt-radio-codes.html">Blaupunkt</a></li>
							<li>PN-2424m</li>
							<li>PN-3001p</li>
							<li>PN-3000p</li>
							<li>AGC-0070rf</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section class="about-us seperator">
			<div
				class="wrap-it-up"
				id="about-orc"
			>
				<h3 class="tac h2">Why Choose us to Decode your Nissan Radio Code?</h3>
				<img
					src="img/nissan-radio-code-service-online.jpg"
					alt="Nissan Radio Code Service Online With Free Entry Instructions"
					style="float:left"
					class="about-orc"
				>
				<div class="about-text">
					<p>First and foremost we value <a
							href="customer-reviews.html"
							title="Trustpilot Reviews"
							target="_blank"
						>customer service</a>, it is one of our core values and why we are one of the very few
						companies to offer a money back guarantee. We go above and beyond to give our customers the
						fastest and most knowledgeable service, rest assured your in safe hands.</p>
					<p style="margin-bottom: 40px;">OnlineRadioCodes.co.uk is the U.K's No.1 <a
							href="index.htm">Radio Code</a> Company. We was established off the back of many
						customers not being happy to pay the prices of local garages and dealerships to unlock their
						car radio. Once you have the serial number for your <strong>Nissan radio</strong>, enter
						this into our simple 3 step process to get your radio unlock code online.</p>
					<p>You can also call our radio experts on <a href="tel:01942604333">01942 604333</a> to obtain
						your radio decode instantly over the phone via credit or debit card. Our phone lines are
						available from <strong>9am - 5:30pm (Mon - Fri)</strong>.</p>
					<p>We also offer a <strong>free Nissan radio code</strong> lifetime code retrieval service, so
						if you ever lose your radio decode you don't need to worry! The decode we provide will
						always work for your radio.</p>
				</div>
			</div>
		</section>
	@endif
@endsection
@section('footer_content')
@endsection