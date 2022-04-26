@extends('website.layout.layout')
@section('header_content')
@endsection
@section('content')
		<section class="home hero-image view-all">
			<div class="turn-off-the-lights-home"></div>
			<div class="wrap-it-up">
				<div class="hero-container">
					<h1 class="shd">Find Your Car Radio Code</h1>
					<p class="header-txt shd mb-hide">OnlineRadioCodes.co.uk is the No.1 online & stress free radio
						decoding service throughout worldwide. please see our catalogue of car and radio manufacturers
						below. If you are unable to locate your radio unlock code, please don't hesitate to <a
							href="contact-us.html"
						>contact us</a>, car radio experts are on hand to help with any query and will give you the best
						advice possible.</p>
					<div class="hero-reviews review-fader-wrap">
						<div
							class="review-fader top modal-button"
							data-popup="tp"
						>
							<span>Rated <b><span class="tpScore">4.7</span> / 5 </b>from <b><span
										class="tpReviews">15,489&nbsp;</span></b>reviews</span>
							<div class="hero-tp-wrap">
								<span class="hero-tp-logo"><img
										src="{{asset('assets/img/trustpilot.svg')}}"
										alt=""
									></span>
								<span class="hero-tp-stars"><img
										src="{{asset('assets/img/Trustpilot_ratings_5star-RGB.svg')}}"
										alt=""
									></span>
							</div>
						</div>
						<div
							class="review-fader bottom modal-button"
							data-popup="tp"
						>
							<span>Rated <b><span class="tpScore">4.92</span> / 5 </b>from <b><span
										class="tpReviews">7,217&nbsp;</span></b>reviews</span>
							<div class="hero-rv-wrap">
								<span class="hero-tp-logo"><img
										src="{{asset('assets/img/reviews-logo--white.svg')}}"
										alt=""
									></span>
								<span class="hero-tp-stars"><img
										src="{{asset('assets/img/reviews-stars.svg')}}"
										alt=""
									></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="seperator-top" style="background: #e2e2e2">
			<div id="view-all-land2" class="wrap-it-up">
				<div class="ford__most-popular-banner">
					<a href="ford-radio-codes.html"><span>Radio Codes for <strong>Ford</strong> Cars</span><i
							class="fa fa-arrow-circle-right"
						></i><span></span></a>
					<span>Most Popular</span>
				</div>
				<div class="allcodes cds">
					<ul>
						<ul class="allcodes__grid">
                            @foreach($brands as $each)
							<li class="alfa"><a
									href="{{route('radio-code-order.show', $each)}}"
									title="{{$each->name}}"
								><span><img src="{{$each->logo_url}}"></span><span>{{$each->name}}</span></a>
                            </li>
                            @endforeach
						</ul>
					</ul>
				</div>
			</div>
		</section>
		<div class="modal-popup__wrap" data-popup="tp" >
			<div class="modal-popup">
				<span class="modal-close close close-icon"><i
						style="color:#fff;font-size:24px;margin:0;"
						class="fa fa-times"
						aria-hidden="true"
					></i></span>
				<div
					class="trustpilot-widget"
					id="tp-widget-banner"
					data-locale="en-GB"
					data-template-id="539ad60defb9600b94d7df2c"
					data-businessunit-id="557f1e540000ff00058039d2"
					data-style-height="600px"
					data-style-width="460px"
					data-theme="dark"
					data-stars="1,2,3,4,5"
				>
				</div>
			</div>
		</div>
		<div class="modal-popup__wrap" data-popup="rv" >
			<div class="modal-popup">
				<span class="modal-close close close-icon"><i
						style="color:#fff;font-size:24px;margin:0;"
						class="fa fa-times"
						aria-hidden="true"
					></i></span>
				<div class="reviews-wrap">
					<span class="reviews-header-wrap">
						<img
							src="{{asset('assets/img/reviews-logo--white.svg')}}"
							alt=""
						>
						<img
							src="{{asset('assets/img/reviews-stars.svg')}}"
							alt=""
						>
					</span>
					<script
						src="vertical/dist.js"
						type="6b1247fb91052ad3d600cc2b-text/javascript"
					></script>
					<div
						id="full-page-widget"
						style="width:100%;"
					></div>
					<script type="6b1247fb91052ad3d600cc2b-text/javascript">
			verticalWidget('full-page-widget',{
			store: 'online-radio-codes',
			primaryClr: '#12cf6c',
			layout:'fullWidth',
			height: 600,
			numReviews: 15
			});
			</script>
				</div>
			</div>
			<style>
				.reviews-wrap {
					padding: 30px 20px;
				}

				.reviews-header-wrap {
					display: flex;
					margin-bottom: 30px;
					justify-content: center;
				}

				.reviews-header-wrap img {
					height: 30px;
					display: block;
				}

				@media(max-width: 600px) {
					.reviews-header-wrap img {
						height: 25px;
					}
				}
			</style>
		</div>
		<style>
			.ww-payments__wrap {
				/* position: fixed; */
				/* bottom: 0; */
				width: 100%;
				display: block;
				z-index: 1001;
				transform: translateY(-50%);
				transition: all .3s ease;
			}

			.ww-payments__wrap.active {
				transform: translateY(0) !important
			}

			.sticky-options {
				position: fixed;
				/* border-top: 1px solid #ccc; */
				bottom: 0px;
				left: 0;
				right: 0;
				z-index: 3;
				transition: all 0.2s ease;
				transform: translateY(100%);
			}

			.sticky-options .product-buying__sticky {
				padding: 1rem;
				position: relative;
				z-index: 1003;
				background-color: #fff;
			}

			.sticky-options .sets-sticky-btn__flex {
				margin: auto;
				display: flex;
				justify-content: space-between;
			}

			.sticky-options.product-page {
				position: fixed;
			}

			.sticky-options.active {
				transform: translateY(0%);
			}

			.sticky-options.active .ww-payments__wrap {
				transform: translateY(50%);
			}

			.sticky-options #ShareButton {
				margin-right: 1rem;
				border-radius: 30px;
				display: none;
			}

			@media (max-width: 991px) {
				.sticky-options #ShareButton {
					display: block;
				}
			}

			.sticky-options .sticky-btn__desc {
				display: flex;
				flex-direction: column;
				justify-content: center;
			}

			.sticky-options .buy-btn {
				display: flex;
				align-items: center;
				justify-content: center;
				font-size: 18px;
			}

			@media(max-width: 480px) {
				.sticky-options .buy-btn {
					/* width: 150px; */
				}
			}

			.sticky-options .sticky-btn__desc h5 {
				margin: 0;
			}

			@media (max-width: 480px) {
				.sticky-options .sticky-btn__desc .flex {
					justify-content: center;
					font-size: 1.6rem;
				}

				.sticky-options .sticky-btn__desc {
					display: none;
				}
			}

			.sticky-options .button,
			.sticky-options .amazon-affiliate-button,
			.sticky-options form {
				width: 310px;
				padding: 10px 8px;
			}

			.sticky-options .button .button-price,
			.sticky-options .amazon-affiliate-button .button-price,
			.sticky-options form .button-price {
				display: none;
			}

			@media (max-width: 540px) {

				.sticky-options .button,
				.sticky-options .amazon-affiliate-button,
				.sticky-options form {
					width: 160px;
				}
			}

			.sticky-options .fw {
				width: 100%;
			}

			.sticky-options .amazon-affiliate-button {
				padding: 1rem;
				justify-content: center;
			}
		</style>
		<div class="sticky-options">
			<div class="ww-payments__wrap">
				<div class="ww-payments__btn">
					<i class="flag-icon flag-icon-pk"></i>
					<i
						class="fa fa-caret-right caret"
						aria-hidden="true"
					></i>
				</div>
				<div class="ww-payments__content">
					<span class="ww-text__wrap">
						<img
							src="{{asset('assets/img/icon-worldwide.svg')}}"
							alt="Worldwide payments accepted"
						>
						<span>Worldwide payments accepted.</span>
						<img
							class="payment-icons"
							src="{{asset('assets/img/payment-icons-new.svg')}}"
							alt="We accept the following payments"
						>
					</span>
				</div>
			</div>
		</div>
@endsection
@section('footer_content')
@endsection