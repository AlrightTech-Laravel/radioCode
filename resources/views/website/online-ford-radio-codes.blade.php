@extends('website.layout.layout')

@section('header_content')
<style>
    .trusted-btn {
        background: #0a0a0a;
        border-color: #0a0a0a;
        border-radius: 5px;
        padding: 15px 0 15px 0;
    }

    .trusted-btn span {
        font-size: 15px;
    }

    .choosus-hide {
        display: block;
    }

    .trust-btn-hide {
        display: none;
    }

    @media screen and (max-width: 768px) {
        .trust-btn-hide {
            display: block;
        }

        .choosus-hide {
            display: none;
        }
    }
</style>
@endsection

@section('content')

@include('website.layout.header')



<header class="hero has-background is-medium is-white homepage is-primary-gradient section-arrow next-is-light">

    <div class="container has-text-centered is-max-desktop">

        <div class="hero-body has-padding-sides">

            <div class="hero__inner">

                <h1 class="title is-2 is-spaced mb-5">Ford Radio Codes £7.99</h1>

                <p class="subtitle">We provide all Ford vehicle radio codes, including Focus, Fiesta, Transit and more. Get yours today.</p>

            </div>

            <form id="BuyBox" action="/checkout/contact-information.php" method="POST" autocomplete="off">

                <div class="secure-checkout is-flex is-align-items-center is-justify-content-center mt-3 has-text-centered">

                    <svg width="24px" height="20px" viewBox="0 0 24 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                        <title>Secure Checkout</title>

                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">

                            <g id="secure-payment" fill-rule="nonzero">

                                <path d="M23.6082546,8.99933466 L20.9984475,8.4293768 L20.9984475,1.99985215 C20.9984475,0.895364304 20.1030832,0 18.9985954,0 L1.99985215,0 C0.895364304,0 0,0.895364304 0,1.99985215 L0,11.9991129 C0,13.1036007 0.895364304,13.998965 1.99985215,13.998965 L14.3089421,13.998965 C14.6843968,16.4346168 16.4864393,18.4062168 18.8786043,18.9985954 C19.6385481,19.1885813 23.4982627,17.4987063 23.7532439,13.4290072 L23.9982258,9.52929548 C24.0191738,9.27994341 23.8525508,9.05350698 23.6082546,8.99933466 Z M0.999926073,3.49974126 L19.9985215,3.49974126 L19.9985215,5.4995934 L0.999926073,5.4995934 L0.999926073,3.49974126 Z M1.99985215,0.999926073 L18.9985954,0.999926073 C19.5508393,0.999926073 19.9985215,1.44760823 19.9985215,1.99985215 L19.9985215,2.49981518 L0.999926073,2.49981518 L0.999926073,1.99985215 C0.999926073,1.44760823 1.44760823,0.999926073 1.99985215,0.999926073 Z M0.999926073,11.9991129 L0.999926073,6.49951948 L19.9985215,6.49951948 L19.9985215,8.20939306 C18.6736194,7.91441487 19.8885296,7.78942411 14.3889362,9.00933392 C14.1563771,9.06170712 13.9931406,9.27098463 13.998965,9.50929696 L14.2189488,12.999039 L1.99985215,12.999039 C1.44760823,12.999039 0.999926073,12.5513568 0.999926073,11.9991129 Z" id="Shape" fill="#0A0A0A"></path>

                                <path d="M17.85368,13.1440282 C17.6576334,12.9479817 17.3397791,12.9479817 17.1437325,13.1440283 C16.947686,13.3400748 16.947686,13.6579291 17.1437325,13.8539757 C18.7886109,15.4938545 18.1436586,15.5538501 20.8534583,12.8540497 C21.0495048,12.6580031 21.0495048,12.3401488 20.8534582,12.1441022 C20.6574117,11.9480556 20.3395573,11.9480556 20.1435107,12.1441022 L18.4986324,13.7939802 L17.85368,13.1440282 Z" id="Path" fill="#3BBE85"></path>

                                <path d="M10.4992238,8.49937162 L2.49981518,8.49937162 C2.22369322,8.49937162 1.99985215,8.7232127 1.99985215,8.99933466 C1.99985215,9.27545662 2.22369322,9.4992977 2.49981518,9.4992977 L10.4992238,9.4992977 C10.7753457,9.4992977 10.9991868,9.27545662 10.9991868,8.99933466 C10.9991868,8.7232127 10.7753457,8.49937162 10.4992238,8.49937162 Z" id="Path" fill="#0A0A0A"></path>

                                <path d="M7.49944555,10.4992238 L2.49981518,10.4992238 C2.22369322,10.4992238 1.99985215,10.7230648 1.99985215,10.9991868 C1.99985215,11.2753088 2.22369322,11.4991498 2.49981518,11.4991498 L7.49944555,11.4991498 C7.77556751,11.4991498 7.99940859,11.2753088 7.99940859,10.9991868 C7.99940859,10.7230648 7.77556751,10.4992238 7.49944555,10.4992238 Z" id="Path" fill="#0A0A0A"></path>

                            </g>

                        </g>

                    </svg>

                    <span class="ml-2">Secure Checkout</span>

                </div>

                <div class="field has-addons">

                    <div class="control">

                        <input id="radio-serial" name="serial" type="serial" class="input is-large rotating-placeholder" type="text" placeholder="SERIAL NUMBER" data-placeholder="V123456,M987456,C73F0961 C 0536857,BP62034 596031, Serial Number">

                    </div>

                    <div class="control is-hidden">

                        <input type="hidden" name="product" value="Ford Radio Codes">

                        <input type="hidden" name="currency_code" value="GBP">

                        <input type="hidden" name="amount" value="7.99">

                        <input type="hidden" name="wait_time" value="Instantly Displayed">

                    </div>

                    <div class="control">

                        <button id="Go" class="button is-black">

                            <span class="icon is-large"><i class="mdi mdi-arrow-right-circle-outline"></i></span>

                        </button>

                    </div>

                    <p class="help is-danger"></p>

                </div>

                <div class="under-buy-box">

                    <div>

                        <span>Est Time: <i class="mdi mdi-lightning-bolt"></i> Instantly Displayed</span>

                    </div>

                    <span class="is-hidden">100% Money Back Guarantee</span>

                    <div>

                        <a class="jb-modal" data-target="example-images-box-modal" title="Example Serials">

                            <span><i class="mdi mdi-information-outline mr-1"></i>Example Serials</span>

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

</header>



<section class="section is-small is-light section-arrow

                next-is-black">

    <div class="hero-sp mb-6">

        <div class="is-hidden-mobile">

            <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b6ffb0d04a076446a9af" data-businessunit-id="557f1e540000ff00058039d2" data-style-height="24px" data-style-width="100%" data-theme="light">

                <a href="https://uk.trustpilot.com/review/onlineradiocodes.co.uk" target="_blank" rel="noopener">Trustpilot</a>

            </div>

        </div>

        <div class="is-hidden-desktop is-hidden-tablet">

            <div class="trustpilot-widget" data-locale="en-GB" data-template-id="53aa8807dec7e10d38f59f32" data-businessunit-id="557f1e540000ff00058039d2" data-style-height="150px" data-style-width="100%" data-theme="light">

                <a href="https://uk.trustpilot.com/review/onlineradiocodes.co.uk" target="_blank" rel="noopener">Trustpilot</a>

            </div>

        </div>

    </div>

    <div class="container has-text-centered">

        <div class="columns">

            <div class="column">

                <h2 class="title is-2 is-spaced mb-5">How To Find

                    Your Serial Number</h2>

            </div>

        </div>

        <div class="main-masonary bricklayer">

            <div class="content">

                <div class="swiper-slide card">

                    <div class="swiper-container">

                        <div class="swiper-image-part">

                            <img class="is-radius" src="img/ford-radio-code-6000cd.jpg" alt="1. How Do I Find My Ford 6000CD

                                            Radio Radio's Serial Number?">

                        </div>

                        <div class="swiper-info-part">

                            <div class="swiper-text has-text-left">

                                <p class="title is-4">Ford 6000CD

                                    Radio</p>



                                <div class="watch-video jb-modal" data-target="WatchVideo" data-video-id="HVQDBMGD_p0"><span class="icon"><i class="mdi

                                                        mdi-play-circle-outline"></i></span>Watch

                                    Video</div>

                                <p>

                                <p><strong>2004 - 2012</strong></p>

                                <p>The serial number is the

                                    first thing you need to

                                    generate your Ford radio

                                    code. You can obtain this by

                                    pressing and holding buttons

                                    1 and 6 simultaneously while

                                    the radio is on. A code

                                    cycle will then be

                                    initiated.</p>

                                <p>You are looking for a serial

                                    starting with the letter V

                                    followed by 6 digits this

                                    will be displayed towards

                                    the end of the cycle.</p>

                                <p>You might see some of the

                                    serial on one screen for

                                    example <strong>V1979</strong>

                                    ond then&nbsp;<strong>05</strong>&nbsp;on

                                    the next screen if the

                                    serial happens to be

                                    separated over two screen

                                    cycles.&nbsp;In this case,

                                    you will need to combine

                                    them to get the full serial

                                    number.</p>

                                <p>In cases where your serial

                                    does not display on the

                                    screen you will need to

                                    remove the radio. You can do

                                    this by using some <a title="Radio Release

                                                        Keys" href="https://amzn.to/3qg2lK5" target="_blank" rel="noopener">radio

                                        release keys.</a> Once

                                    you have removed your radio

                                    the serial number will be

                                    printed on the label located

                                    on the top, side or bottom

                                    of the casing.</p>

                                <p>Serial Example: <strong>V123456</strong></p>

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="seller-bar is-hidden-tablet

                                is-hidden-desktop">

                    <a id="trusted-button" class="jb-modal is-medium

                                    is-text is-flex is-flex-direction-column" data-target="TrustedModal">

                        <span><i class="mdi mdi-shield-lock-outline"></i><span class="ml-1"><b>Trusted Supplier</b></span></span>

                        <small class="button-learn-more">Learn More</small>

                    </a>

                </div>

            </div>

        </div>

        <small style='text-transform: uppercase; margin-top: 2rem;

                        display: block;'><b>Page Updated: <time datetime='2022-03-17 17:06:00'>17th March

                    2022</time></b></small>

    </div>

</section>

<section class="section is-small trust-btn-hide" id="trusrted-btn-section">

    <div class="columns">

        <div class="column has-text-centered">
            <a href="#" onClick="return display_choose_section()">
                <h2 class="title is-2 is-spaced mb-5 trusted-btn text-white">
                    <i class="mdi mdi-shield-lock-outline"></i>Trusted Supplier<br><span>Learn More</span>
                </h2>
            </a>
        </div>

    </div>

</section>

<section class="section is-small is-black choosus-hide" id="chooseus-section">

    <div class="container">

        <div class="columns">

            <div class="column has-text-centered">

                <h2 class="title is-2 is-spaced mb-5">Why Choose Us?</h2>

            </div>

        </div>



        <div id="SellingPoints" class="swiper-container">


            <div class="columns is-multiline is-mobile">
                @if(isset($chooses))
                @foreach($chooses as $choose)

                <div class="column is-one-quarter-desktop is-half-tablet is-full-mobile">

                    <div class="selling-point-wrapper">

                        <div class="selling-point-header">

                            <div class="image selling-point-icon justify-content">

                                <img src="{{ url('Uploads/'.$choose->image) }}">

                            </div>

                            <h5 class="title is-5 is-spaced mb-5">{{ $choose->title }}</h5>
                        </div>
                        <p class="is-hidden-mobile">{{ $choose->description }}</p>

                    </div>
                </div>


                @endforeach
                @endif
            </div>
        </div>

    </div>

</section>



<section class="section is-small is-light">

    <div class="container has-text-centered">

        <div class="columns">

            <div class="column">

                <h2 class="title is-2 is-spaced mb-5">Most Popular

                    Ford Cars & Radios</h2>

            </div>

        </div>

    </div>

    <div class="container is-fluid">

                
        <div id="MostPopularSLider" class="swiper">
        
            <div class="swiper-wrapper row">
            @foreach($brands as $brand)
                <div class="swiper-slide col-lg-4 col-md-12 col-xs-12 col-centered">

                    <div class="card most-popular-card-container">

                        <a class="most-popular-card-link" href="/ford-focus-radio-codes" title="Ford Focus Radio Code">

                            <h4 class="title is-4

                                most-popular-card-title">{{ $brand->name }}</h4>

                            <div class="most-popular-card-image"><img src="{{ $brand->logo_url }}" alt="Ford Focus Radio Code"></div>

                        </a>

                    </div>

                </div>

                
        @endforeach
<!-- 
                <div class="swiper-slide col-lg-4 col-md-12 col-xs-12 col-centered">

                    <div class="card most-popular-card-container">

                        <a class="most-popular-card-link" href="/ford-fiesta-radio-codes" title="Ford Fiesta Radio Code">

                            <h4 class="title is-4 most-popular-card-title">Ford Fiesta</h4>

                            <div class="most-popular-card-image"><img src="img/popular-ford-fiesta-radio.jpg" alt="Ford Fiesta Radio Code">

                            </div>

                        </a>

                    </div>

                </div>

                <div class="swiper-slide col-lg-4 col-md-12 col-xs-12 col-centered">

                    <div class="card most-popular-card-container">

                        <a class="most-popular-card-link" href="/ford-transit-radio-codes" title="Ford Transit Radio Code">

                            <h4 class="title is-4 most-popular-card-title">Ford Transit</h4>
                            <div class="most-popular-card-image"><img src="img/popular-ford-transit-radio.jpg" alt="Ford Transit Radio Code">
                            </div>
                        </a>
                    </div>
                </div> -->
            </div>
            <br>

            <!-- <div class="swiper-wrapper row">



                <div class="swiper-slide col-lg-4 col-md-12 col-xs-12 col-centered">

                    <div class="card most-popular-card-container">

                        <a class="most-popular-card-link" href="/ford-6000-cd-radio-codes" title="Ford 6000 CD Radio Code">

                            <h4 class="title is-4

                                                        most-popular-card-title">Ford 6000

                                CD</h4>

                            <div class="most-popular-card-image"><img src="{{asset('img/popular-ford-focus-radio.jpg')}}" alt="Ford 6000 CD Radio Code"></div>

                        </a>

                    </div>

                </div>

                <div class="swiper-slide col-lg-4 col-md-12 col-xs-12 col-centered">

                    <div class="card most-popular-card-container">

                        <a class="most-popular-card-link" href="/ford-sony-radio-codes" title="Ford Sony Radio Code">

                            <h4 class="title is-4

                                                        most-popular-card-title">Ford Sony</h4>

                            <div class="most-popular-card-image"><img src="{{asset('img/popular-ford-focus-radio.jpg')}}" alt="Ford Sony Radio Code"></div>

                        </a>

                    </div>

                </div>

                <div class="swiper-slide col-lg-4 col-md-12 col-xs-12 col-centered">

                    <div class="card most-popular-card-container">

                        <a class="most-popular-card-link" href="/ford-4500-rds-radio-codes" title="Ford 4500 RDS Radio Code">

                            <h4 class="title is-4

                                                        most-popular-card-title">Ford 4500

                                RDS</h4>

                            <div class="most-popular-card-image"><img src="{{asset('img/popular-ford-focus-radio.jpg')}}" alt="Ford 4500 RDS Radio Code">

                            </div>

                        </a>

                    </div>

                </div>

            </div> -->



        </div>

    </div>

    </div>

    </div>

</section>

<section class="section is-small is-white">

    <div class="container is-max-desktop">

        <div class="columns is-centered">

            <div class="column is-two-thirds">

                <div class="block">

                    <h2 class="title is-2 is-spaced mb-5

                                    has-text-centered">Frequently Asked Questions</h2>

                </div>

                <div class="block">

                    <div class="accordion has-text-left">

                        <div class="faq-item">

                            <a class="faq-header how-to-enter" href="/pages/how-to-enter-ford-radio-code">

                                <span>How To Enter Your Ford Code</span>

                                <span class="icon"><i class="mdi

                                                    mdi-arrow-right-circle"></i></span>

                            </a>

                        </div>

                        @foreach($faqs as $faq)
                        <div>
                            <div class="faq-item accordion-item">

                                <div class="faq-header accordion-title">

                                    <span>{{ $faq->title }}</span>

                                    <span class="icon"><i class="mdi

                                                    mdi-plus"></i></span>

                                </div>

                                <div class="faq-content accordion-content">

                                    <p>{{ $faq->description }}</p>

                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>


                </div>

                <div class="block">

                    <p><small>*Disclaimer: Please note that Online Radio

                            Codes is a independant website and in no way

                            authorised by, connected to or otherwise

                            associated with 'Ford Motor Company Limited'

                            all copyrights and trademarks are of the

                            respected owner Ford, we do not sell or

                            provide any products that are the same our

                            similiar to Ford. We are car radio decoding

                            specialist and all of our decodes are either

                            obtain through databases which we own, or

                            via in house radio decoding tools.</small></p>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="section is-small is-black">
    <div class="container">
        <div class="columns">
            <div class="column has-text-centered">
                <div class="block">
                    <div>
                        <h2 class="title is-2 is-spaced mb-5">What People Are Saying</h2>
                    </div>
                    <div class="have-your-say">
                        <p class="control">
                            <a class="jb-modal button is-black" data-target="RVModal">
                                <span class="icon is-small">
                                    <i class="mdi mdi-bullhorn-outline"></i>
                                </span>
                                <span>Have your say</span>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="block stars">
                    <div class="star-rating" title="98.6%">
                        <div class="back-stars">
                            <span class="icon"><i class="mdi mdi-star"></i></span>
                            <span class="icon"><i class="mdi mdi-star"></i></span>
                            <span class="icon"><i class="mdi mdi-star"></i></span>
                            <span class="icon"><i class="mdi mdi-star"></i></span>
                            <span class="icon"><i class="mdi mdi-star"></i></span>
                            <div class="front-stars" style="width:98.6%">
                                <span class="icon"><i class="mdi mdi-star"></i></span>
                                <span class="icon"><i class="mdi mdi-star"></i></span>
                                <span class="icon"><i class="mdi mdi-star"></i></span>
                                <span class="icon"><i class="mdi mdi-star"></i></span>
                                <span class="icon"><i class="mdi mdi-star"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <span>4.93 out of 5 (4721 reviews)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column has-text-centered">
                <div id="ReviewSection">
                    <div class="review-masonary bricklayer">
                        <div class="bricklayer-column">
                            <div class="review-masonry-card masonary-item">
                                <div class="card">
                                    <header class="card-header">
                                        <div class="review-masonry-title">
                                            <div class="review-masonry-stars"> <span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span></div>
                                            <img class="manu" src="img/ford.svg">
                                            <p class="card-header-title">Fast and genuine. Told me...</p>
                                        </div>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="review-masonry-text">
                                                <p>Fast and genuine. Told me how to get serial off stereo and a lot cheaper the main dealer. Had my code instantly after paying through PayPal. Would recommend any day.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <span href="#" class="card-footer-item">
                                            <img class="flag" src="img/flags/gb.svg">Mark Finney </span>
                                        <span href="#" class="card-footer-item">23 April</span>
                                    </footer>
                                </div>
                            </div>
                            <div class="review-masonry-card masonary-item">
                                <div class="card">
                                    <header class="card-header">
                                        <div class="review-masonry-title">
                                            <div class="review-masonry-stars"> <span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span></div>
                                            <img class="manu" src="img/ford.svg">
                                            <p class="card-header-title">Didn't receive the code instantly...</p>
                                        </div>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="review-masonry-text">
                                                <p>Didn't receive the code instantly like stated on the site I had to call up next day and retrieve it from the company myself but they had it ready so there was no headache can't complain about the service other than that.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <span href="#" class="card-footer-item">
                                            <img class="flag" src="img/flags/gb.svg">
                                            Jaheem H </span>
                                        <span href="#" class="card-footer-item">22 April</span>
                                    </footer>
                                </div>
                            </div>
                            <div class="review-masonry-card masonary-item">
                                <div class="card">
                                    <header class="card-header">
                                        <div class="review-masonry-title">
                                            <div class="review-masonry-stars"> <span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span></div>
                                            <img class="manu" src="img/ford.svg">
                                            <p class="card-header-title">Instant code. Easy to use...</p>
                                        </div>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="review-masonry-text">
                                                <p>Instant code. Easy to use service A++++</p>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <span href="#" class="card-footer-item">
                                            <img class="flag" src="img/flags/gb.svg">
                                            Mathew Rees </span>
                                        <span href="#" class="card-footer-item">22 April</span>
                                    </footer>
                                </div>
                            </div>
                            <div class="review-masonry-card masonary-item">
                                <div class="card">
                                    <header class="card-header">
                                        <div class="review-masonry-title">
                                            <div class="review-masonry-stars"> <span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span></div>
                                            <img class="manu" src="img/ford.svg">
                                            <p class="card-header-title">Instant result and worked perfectly!...</p>
                                        </div>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="review-masonry-text">
                                                <p>Instant result and worked perfectly!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <span href="#" class="card-footer-item">
                                            <img class="flag" src="img/flags/gb.svg">
                                            Kimberley Fudge </span>
                                        <span href="#" class="card-footer-item">20 April</span>
                                    </footer>
                                </div>
                            </div>
                            <div class="review-masonry-card masonary-item">
                                <div class="card">
                                    <header class="card-header">
                                        <div class="review-masonry-title">
                                            <div class="review-masonry-stars"> <span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span></div>
                                            <img class="manu" src="img/ford.svg">
                                            <p class="card-header-title">Tryed ford main dealer. What...</p>
                                        </div>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="review-masonry-text">
                                                <p>Tryed ford main dealer. What a joke wanted a small fortune and have to wait 3days????Online line radiocode was so easy and got got the code within minutes</p>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <span href="#" class="card-footer-item">
                                            <img class="flag" src="img/flags/gb.svg">
                                            Jonathan </span>
                                        <span href="#" class="card-footer-item">19 April</span>
                                    </footer>
                                </div>
                            </div>
                        </div>
                        <div class="bricklayer-column">
                            <div class="review-masonry-card masonary-item">
                                <div class="card">
                                    <header class="card-header">
                                        <div class="review-masonry-title">
                                            <div class="review-masonry-stars"> <span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span></div>
                                            <img class="manu" src="img/ford.svg">
                                            <p class="card-header-title">Didn't receive the code instantly...</p>
                                        </div>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="review-masonry-text">
                                                <p>Didn't receive the code instantly like stated on the site I had to call up next day and retrieve it from the company myself but they had it ready so there was no headache can't complain about the service other than that.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <span href="#" class="card-footer-item">
                                            <img class="flag" src="img/flags/gb.svg">
                                            Jaheem H </span>
                                        <span href="#" class="card-footer-item">23 April</span>
                                    </footer>
                                </div>
                            </div>
                            <div class="review-masonry-card masonary-item">
                                <div class="card">
                                    <header class="card-header">
                                        <div class="review-masonry-title">
                                            <div class="review-masonry-stars"> <span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span></div>
                                            <img class="manu" src="img/ford.svg">
                                            <p class="card-header-title">"Thankyou very much for your...</p>
                                        </div>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="review-masonry-text">
                                                <p>"Thankyou very much for your very prompt service.I did not contact you until 8.40pm and so did not expect the code until the following day.True to your word I received the radio code today,which I have made a note of.Ford wanted 82 for the same.Once again I thankyou very much.Regards Geoff Mancicius,Cannock,Staffordshire."</p>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <span href="#" class="card-footer-item">
                                            <img class="flag" src="img/flags/gb.svg">
                                            Geoff Mancicius </span>
                                        <span href="#" class="card-footer-item">22 April</span>
                                    </footer>
                                </div>
                            </div>
                            <div class="review-masonry-card masonary-item">
                                <div class="card">
                                    <header class="card-header">
                                        <div class="review-masonry-title">
                                            <div class="review-masonry-stars"> <span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span></div>
                                            <img class="manu" src="img/ford.svg">
                                            <p class="card-header-title">my car battery in my...</p>
                                        </div>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="review-masonry-text">
                                                <p>my car battery in my ford mondeo had went and unfortunately didn't have a code to reboot radio..after trying different things and looking online at ways to start it is eventually decided to use online radio codes..i wasn't sure at first abou</p>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <span href="#" class="card-footer-item">
                                            <img class="flag" src="img/flags/gb.svg">
                                            Anonymous </span>
                                        <span href="#" class="card-footer-item">21 April</span>
                                    </footer>
                                </div>
                            </div>
                            <div class="review-masonry-card masonary-item">
                                <div class="card">
                                    <header class="card-header">
                                        <div class="review-masonry-title">
                                            <div class="review-masonry-stars"> <span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span></div>
                                            <img class="manu" src="img/ford.svg">
                                            <p class="card-header-title">"brilliant - what a fantastic...</p>
                                        </div>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="review-masonry-text">
                                                <p>"brilliant - what a fantastic service - quick ,easy,cheap and all done from the comfort of my own home . its a small thing not having a working radio but annoying , you guys dealt with it instantly - saved me the hassel of going to a deal and paying over the odds - well done - keep it up"</p>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <span href="#" class="card-footer-item">
                                            <img class="flag" src="img/flags/gb.svg">
                                            Mr Bolton </span>
                                        <span href="#" class="card-footer-item">20 April</span>
                                    </footer>
                                </div>
                            </div>
                            <div class="review-masonry-card masonary-item">
                                <div class="card">
                                    <header class="card-header">
                                        <div class="review-masonry-title">
                                            <div class="review-masonry-stars"> <span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span><span class="icon"><i class="mdi mdi-star"></i></span></div>
                                            <img class="manu" src="img/ford.svg">
                                            <p class="card-header-title">Excellent instant service would highly...</p>
                                        </div>
                                    </header>
                                    <div class="card-content">
                                        <div class="content">
                                            <div class="review-masonry-text">
                                                <p>Excellent instant service would highly recommend and definatly use again</p>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <span href="#" class="card-footer-item">
                                            <img class="flag" src="img/flags/gb.svg">
                                            Lawrence Coplestone </span>
                                        <span href="#" class="card-footer-item">18 April</span>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script type="4ad272c5c0a5a13933db3d84-text/javascript">
    var bricklayer1 = new Bricklayer(document.querySelector('.review-masonary'))
    var bricklayer2 = new Bricklayer(document.querySelector('.main-masonary'))
    var swiper = new Swiper("#MostPopularSLider", swiperOptions);

    var swiperOptions = {

        loop: true,

        grabCursor: true,

        mousewheelControl: true,

        keyboardControl: true,

        slidesPerView: 3

    };
</script>

<script>
    function display_choose_section() {
        jQuery('#chooseus-section').css('display', 'block');
        return false;
    }

    //   const swiper = new Swiper('.swiper', {

    //   // Optional parameters

    //   direction: 'vertical',

    //   loop: true,



    //   // And if we need scrollbar

    //   scrollbar: {

    //     el: '.swiper-scrollbar',

    //   },

    // });
</script>

@endsection

@section('footer_content')

@endsection