@extends('website.layout.layout')
@section('header_content')
@endsection
@section('content')
<section class="hero has-background is-dark homepage is-large is-primary-gradient section-arrow next-is-light">
    <div class="container is-fluid">
        <picture>
            <source media="(max-width: 768px)" srcset="{{asset('assets/img/online-car-radio-codes-overlay-bg.jpg')}}">
            <img class="hero-background" id="header_change" alt="getmyradiocode.uk.co" src="{{asset('img/bg-1.jpg')}}">
        </picture>
        <div class="hero-head">  
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
                <img class="logo-img" src="{{asset('assets/img/orc-inverse-logo.png')}}" alt="Logo">
                </a>
                </div>
                <div class="navbar-menu navbar-menu-end">
                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable is-hidden-desktop">
                        <a class="button is-white is-outlined">Contact</a>
                        @include('website.layout.mobile-header-contact')
                    </div>
                </div>
                </div>
            </nav>
        </div>
        <div class="hero-body">
            <div class="container is-max-desktop has-text-centered">
                <div class="columns is-centered">
                <div class="column is-four-fifths">
                    <h1 class="title is-1 is-spaced">The Worlds Leading Supplier of Car Radio Codes</h1>
                    <p class="subtitle is-hidden-mobile">We pride ourselves on providing a safe and secure car radio code unlock service.</p>
                    <div id="BuyBox" class="ButtonBox">
                        <div class="control">
                            <button  class="button is-large is-white is-outlined scroll-to" id="btn" data-scroll="ScrollToCodes" data-target="BuyModal">View Radio Codes</button>
                        </div>
                    </div>
                    <div class="hero-sp">
                        <div class="is-hidden-mobile">
                            <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b6ffb0d04a076446a9af" data-businessunit-id="557f1e540000ff00058039d2" data-style-height="24px" data-style-width="100%" data-theme="dark">
                            <a href="review/onlineradiocodes.co.uk.html" target="_blank" rel="noopener">Trustpilot</a>
                            </div>
                        </div>
                        <div class="is-hidden-desktop is-hidden-tablet">
                            <div class="trustpilot-widget" data-locale="en-GB" data-template-id="53aa8807dec7e10d38f59f32" data-businessunit-id="557f1e540000ff00058039d2" data-style-height="150px" data-style-width="100%" data-theme="dark">
                            <a href="review/onlineradiocodes.co.uk.html" target="_blank" rel="noopener">Trustpilot</a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section is-small is-light section-arrow next-is-white" id="ScrollToCodes">
    <div class="container has-text-centered">
        <h2 class="title is-2">Most Popular Car Radios</h2>
        <ul class="most-popular-list">
            @foreach($brands as $each)
            <li class="most-popular-item">
                <a href="{{route('radio-code-order.show', $each)}}" title="{{$each->name}} Radio Code">
                <img src="{{$each->logo_url}}">
                <!-- <svg class="icon is-logo">
                    <use xlink:href="#audi"></use>
                </svg> -->
                <span>{{$each->name}}</span>
                </a>
            </li>
            @endforeach
        </ul>
        <div class="columns">
            <div class="column">
                <a href="{{route('brandsList')}}" id="btn_1" title="See All Radio Codes" class="button is-black is-outlined mt-4 is-medium">
                <span >See all</span>
                </a>
            </div>
        </div>
    </div>
    <!-- <div class="floating-car-2">
        <img src="img/car-2.png">
    </div> -->
</section>
<section class="section is-white is-medium is-relative">
    <div class="container is-max-desktop has-text-centered">
        <div class="columns">
            <div class="column">
                <h2 class="title is-2 is-spaced mb-5">How It Works</h2>
            </div>
        </div>
        <div class="columns is-centered">
            <div class="column is-four-fifths">
                <div class="content">
                <div id="HowItWorks" class="swiper-container pb-6">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="swiper-container">
                            <div class="swiper-image-part">
                                <img src="{{asset('img/how-it-works-1.svg')}}" alt="How it Works - 1. How Do I Find My Radio's Serial Number? ">
                            </div>
                            <div class="swiper-info-part">
                                <p class="title is-4">1. How Do I Find My Radio's Serial Number?</p>
                                <div class="swiper-text">
                                    <p>In some cases you may be able to display your radio's serial number on the screen by pressing and holding buttons 1 and 6 or 2 and 6 together.</p>
                                    <p>Failing this you will have to remove your radio with radio keys the serial number will be on the top or side of the radio unit. For more information navigate to your vehicles page.</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-container">
                            <div class="swiper-image-part">
                                <img src="{{asset('assets/img/how-it-works-2.svg')}}" alt="How it Works - 2. How Do I Order My Radio Code?">
                            </div>
                            <div class="swiper-info-part">
                                <p class="title is-4">2. How Do I Order My Radio Code?</p>
                                <div class="swiper-text">
                                    <p>Once you have your serial number enter this and your email address into our order form and continue through to payment to get your radio code.
                                    <p>Our website is fully protected by a 256bit encryption rest assured your in safe hands.</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="swiper-container">
                            <div class="swiper-image-part">
                                <img src="{{asset('assets/img/how-it-works-3.svg')}}" alt="How it Works - 3. How Do I Receive My Radio Code?">
                            </div>
                            <div class="swiper-info-part">
                                <p class="title is-4">3. How Do I Receive My Radio Code?</p>
                                <div class="swiper-text">
                                    <p>Once purchased, we decode your radio then email out your unlock code and any relavant instructions to assist you.
                                    <p>Most radio decodes are shown instantly after check out 99% of our radio codes are delivered within the hour. However, some specialist codes may take longer.</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev swiper-button-black"></div>
                    <div class="swiper-button-next swiper-button-black"></div>
                </div>
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
                    <span>4.93 out of 5 (17602 reviews)</span>
                </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column has-text-centered">
                <div class="review-masonary">
                @foreach($reviews as $each)
                <div class="review-masonry-card">
                    <div class="card">
                        <header class="card-header">
                            <div class="review-masonry-title">
                            <div class="review-masonry-stars">
                                @for($i=0; $i<$each->rating; $i++ )
                                <span class="icon"><i class="mdi mdi-star"></i></span>
                                @endfor
                            </div>
                            <!-- <img class="manu" src="img/renault.svg"> -->
                            <p class="card-header-title">{{$each->headline}}....</p>
                            </div>
                        </header>
                        <div class="card-content">
                            <div class="content">
                            <div class="review-masonry-text">
                                <p>{{$each->description}}</p>
                            </div>
                            </div>
                        </div>
                        <footer class="card-footer">
                            <span href="#" class="card-footer-item">
                            {{$each->name}} </span>
                            <span href="#" class="card-footer-item">{{$each->created_at->isoFormat('dddd D')}}</span>
                        </footer>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section id="AboutUs" class="section is-medium is-white is-relative" style="z-index:0">
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="content">
                <h2 class="title is-2 is-spaced mb-5">About Us</h2>
                <p>Our priority at Online Radio Code is to serve and offer our customers better every day; improving our online radio code services is an important aspect that has been helping our company to grow from strength to strength. We ensure to provide our clients with swift and innovative services.</p>
                <p>We work hard every hour to ensure that our customers are happy and satisfied because customers satisfaction is an important value for our company. We know how it feels when a service is not up to the required satisfaction which is why we provide our clients with a guarantee of seven (7) day money back free of any administrative charges, this is offered if a radio code simply does not work or the radio has been modified, so the original radio code, that was encoded into your radio by the manufacturing dealer has been altered by decoding tools.</p>
                <p>For the past 7 years, Online Radio Code UK has been at the forefront of radio codes recovery providers in the United Kingdom in which we have provided our service to thousands of customers in need of unlocking codes for almost any type of radio. We have grown with the Internet, and that has enabled us to improve our services by enhancing online retrieval services which have helped us to reach out to many customers worldwide. Our secure code retrieval system contains an unlimited amount of radio codes, that is updated daily, with new car radio makes & radio models added daily, for which can be used to unlock almost any the car radio code or navigation system.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="columns is-hidden-mobile">
        <div class="image-wrapper is-right has-arrow column is-half is-paddingless">
            <img class="image-wrapper_about" alt="OnlineRadioCodes.co.uk" src="{{asset('img/bg-3.jpeg')}}">
        </div>
    </div>
</section>
@endsection
@section('footer_content')
@endsection