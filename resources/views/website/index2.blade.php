@extends('website.layout.layout')
@section('header_content')
@endsection
@section('content')
    <div class="modal-popup__wrap" data-popup="menu">
        <div class="modal-popup modal-popup-white manufacturer-popup-wrapper">
            <div class="modal-header-manu">
                <span>Select a radio</span>
                <span class="modal-close close close-icon"><i
                        style="color:#4c4f52;font-size:24px;margin:0;"
                        class="fa fa-times"
                        aria-hidden="true"
                    ></i></span>
            </div>
            <div class="modal-body-manu-scroll">
                <div class="modal-body-manu">
                </div>
            </div>
        </div>
    </div>
    <style>
        .modal-message {
            height: auto;
        }

        .modal-message-body {
            padding: 20px;
            display: flex;
        }

        .modal-message-body>div {
            width: fit-content;
            margin-left: 20px;
        }

        #js-flex-fix {
            display: none;
        }

        #MobileFixedButton {
            z-index: 5;
            display: flex;
        }

        @media(min-width: 769px) {
            #js-flex-fix {
                display: none;
            }
        }
    </style>
    <div class="overlay"></div>
    <section class="home hero-image">
        <div class="turn-off-the-lights-home"></div>
        <div class="wrap-it-up">
            <div class="hero-container">
                <h1 class="shd">The UK's No.1 Radio Code Company, Unlock Yours Today.</h1>
                <p class="header-txt shd">We pride ourselves on providing a safe and secure <span>car radio code
                        unlock service.</span></p>
                <div class="home-select-car-wrap">
                    <a
                        data-popup="menu"
                        class="home-select-car modal-button"
                    >Select Radio Code by Manufacturer</a>
                </div>
                <div class="hero-reviews review-fader-wrap">
                    <div
                        class="review-fader top modal-button"
                        data-popup="tp"
                    >
                        <span>Rated <b><span class="tpScore">4.7</span> / 5 </b>from <b><span
                                    class="tpReviews">16,350&nbsp;</span></b>reviews</span>
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
                                    class="tpReviews">7,246&nbsp;</span></b>reviews</span>
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
        <ul class="hero-associate">
            <li><img
                    src="{{asset('assets/img/carcraft.svg')}}"
                    alt="Carcraft logo"
                ></li>
            <li><img
                    src="{{asset('assets/img/evans-halshaw.svg')}}"
                    alt="Evans Halshaw logo"
                ></li>
            <li><img
                    src="{{asset('assets/img/carshop-logo.svg')}}"
                    alt="The Car Shop logo"
                ></li>
            <li><img
                    src="{{asset('assets/img/vanarama.svg')}}"
                    alt="Vanarama logo"
                ></li>
            <li><img
                    src="{{asset('assets/img/fords-of-winsford.svg')}}"
                    alt="Fords of Winsford logo"
                ></li>
        </ul>
    </section>
    <section class="seperator grey-bg">
        <div class="wrap-it-up step-process">
            <h2>Simple 3 Step Hassle Free Radio Codes</h2>
            <ul>
                <li class="accordion--menu__button accordion--menu__button--mobile">
                    <h2 class="h3">1. How Do I Find My Radio's Serial Number?</h2>
                    <i
                        class="fa fa-caret-right"
                        aria-hidden="true"
                    ></i>
                </li>
                <li class="accordion--menu accordion--menu__mobile">
                    <img
                        src="{{asset('assets/img/finding-your-radio-code.jpg?v=1.1')}}"
                        alt="How To find your radio code"
                    >
                    <div class="content">
                        <h2 class="h3">1. How Do I Find My Radio's Serial Number?</h2>
                        <p>In some cases you may be able to display your radio's serial number on the screen by
                            pressing and holding buttons 1 and 6 or 2 and 6 together.</p>
                        <p>Failing this you will have to remove your radio with radio keys the serial number will be
                            on the top or side of the radio unit. For more information navigate to your vehicles
                            page.</p>
                    </div>
                </li>
                <li class="accordion--menu__button accordion--menu__button--mobile">
                    <h2 class="h3">2. How Do I Order My Radio Code?</h2>
                    <i
                        class="fa fa-caret-right"
                        aria-hidden="true"
                    ></i>
                </li>
                <li class="accordion--menu accordion--menu__mobile">
                    <img
                        src="{{asset('assets/img/enter-and-buy-your-radio-code.jpg?v=1.1')}}"
                        alt="How to enter and buy your radio code"
                    >
                    <div class="content">
                        <h2 class="h3">2. How Do I Order My Radio Code?</h2>
                        <p>Once you have your serial number enter this and your email address into our order form
                            and continue through to payment to get your radio code.</p>
                        <p>Our website is fully protected by a <b>256bit encryption</b> rest assured your in safe
                            hands.</p>
                        <img
                            class="homepage-payment-icons"
                            src="{{asset('assets/img/payment-icons-new.svg')}}"
                            alt="We accept the following payments"
                        >
                    </div>
                </li>
                <li class="accordion--menu__button accordion--menu__button--mobile">
                    <h2 class="h3">3. How Do I Receive My Radio Code?</h2>
                    <i
                        class="fa fa-caret-right"
                        aria-hidden="true"
                    ></i>
                </li>
                <li class="accordion--menu accordion--menu__mobile last">
                    <img
                        src="{{asset('assets/img/emailed-radio-code.jpg?v=1.1')}}"
                        alt="How do i receive my radio code"
                    >
                    <div class="content">
                        <h2 class="h3">3. How Do I Receive My Radio Code?</h2>
                        <p>Once purchased, we decode your radio then email out your unlock code and any relavant
                            instructions to assist you. </p>
                        <p>Most radio decodes are shown instantly after check out 99% of our radio codes are
                            delivered within the hour. However, some specialist codes may take longer.</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="homepage-reviews seperator grey-bg seperator-new bg-texture review-wrapper" data-popup="product-desc">
        <div class="mobile-title--show mb-hide">
            <h3 class="title-underline"><span>23,596 Reviews &amp; Counting...</span></h3>
            <div class="close__icon close modal-close">
                <span class="close__line close__line-x-1"></span>
                <span class="close__line close__line-x-2"></span>
            </div>
        </div>
        <div
            class="wrap-it-up"
            style="padding-bottom: 0;"
        >
            <div class="mb-hide">
                <div class="new-customer-reviews restricted-h iefix__flex">
                    <div class="homepage customer-reviews-manu">
                        <div>
                            <div class="seller-banner-new__wrap">
                                <div class="seller-banner-new seller-banner-np">
                                    <span class="seller-banner-reviews logo-wrap rv-logo-wrap">
                                        <img
                                            src="{{asset('assets/img/trustpilot.svg')}}"
                                            alt=""
                                        >
                                    </span>
                                    <span class="seller-banner-reviews stars-wrap rv-stars-wrap">
                                        <img
                                            src="{{asset('assets/img/Trustpilot_ratings_5star-RGB.svg')}}"
                                            alt="Trustpilot Rating"
                                        >
                                    </span>
                                    <div class="seller-banner-reviews-under">
                                        <div><span
                                                id="rvScore"><b>4.7&nbsp;</b></span><b><span>/&nbsp;5</span></b>&nbsp;|&nbsp;
                                        </div>
                                        <div><span id="rvReviews"><b>16,350</b>&nbsp;</span><span>reviews</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="seller-banner-new seller-banner-np">
                                    <span class="seller-banner-reviews logo-wrap rv-logo-wrap">
                                        <img
                                            src="{{asset('assets/img/reviews-logo--white.svg')}}"
                                            alt=""
                                        >
                                    </span>
                                    <span class="seller-banner-reviews stars-wrap rv-stars-wrap">
                                        <img
                                            src="{{asset('assets/img/reviews-stars.svg')}}"
                                            alt=""
                                        >
                                    </span>
                                    <div class="seller-banner-reviews-under">
                                        <div><span
                                                id="rvScore"><b>4.92&nbsp;</b></span><span>/&nbsp;5</span>&nbsp;|&nbsp;
                                        </div>
                                        <div><span id="rvReviews"><b>7,246</b>&nbsp;</span><span>reviews</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="mobile-tp-homepage modal-button"
                data-popup="tp"
            >
                <div class="mobile-tp-homepage__top">
                    <span class="">Excellent</span>
                    <img src="{{asset('assets/img/Trustpilot_ratings_5star-RGB.svg"')}}>
                </div>
                <div class="mobile-tp-homepage__bottom">
                    Based on&nbsp;<b>16,350 reviews</b>&nbsp;on <img src="{{asset('assets/img/trustpilot.svg"')}}>
                </div>
            </div>
        </div>
        <div
            id="WriteReviewSection"
            class="bg-texture"
        >
            <span
                id="CloseReviewSection"
                class="close close-icon"
            ><img
                    src="https://onlineradiocodes.co.uk/img/close-icon.svg"
                    alt=""
                ></span>
            <div class="write-review__cont">
                <div>
                    <h4 class="title-review-h4">We'd love to hear your feedback!</h4>
                    <form
                        id="review-form"
                        action="/reviews/add"
                    >
                        <fieldset class="rating">
                            <input
                                required=""
                                type="radio"
                                id="star5"
                                name="rating"
                                value="5"
                            >
                            <label
                                class="full"
                                for="star5"
                                title="Great - 5 stars"
                            ></label>
                            <input
                                required=""
                                type="radio"
                                id="star4"
                                name="rating"
                                value="4"
                            >
                            <label
                                class="full"
                                for="star4"
                                title="Good - 4 stars"
                            ></label>
                            <input
                                required=""
                                type="radio"
                                id="star3"
                                name="rating"
                                value="3"
                            >
                            <label
                                class="full"
                                for="star3"
                                title="Average - 3 stars"
                            ></label>
                            <input
                                required=""
                                type="radio"
                                id="star2"
                                name="rating"
                                value="2"
                            >
                            <label
                                class="full"
                                for="star2"
                                title="Bad - 2 stars"
                            ></label>
                            <input
                                required=""
                                type="radio"
                                id="star1"
                                name="rating"
                                value="1"
                            >
                            <label
                                class="full"
                                for="star1"
                                title="Very Poor - 1 star"
                            ></label>
                        </fieldset>
                        <fieldset>
                            <label for="name">What's your name?</label>
                            <input
                                required=""
                                type="name"
                                id="name"
                                name="name"
                                placeholder="Name"
                            >
                        </fieldset>
                        <fieldset>
                            <label for="review">Help out future customers, leave a review</label>
                            <textarea
                                required=""
                                name="review"
                                id="review"
                                cols="30"
                                rows="10"
                                placeholder="Write a review..."
                            ></textarea>
                        </fieldset>
                        <button class="btn__std btn__std--fill-orange">SUBMIT REVIEW</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us seperator">
        <div
            class="wrap-it-up"
            id="about-orc"
        >
            <h3 class="tac h2">Why 250,000+ Customers Have Chosen Us!</h3>
            <div class="about-text">
                <div class="about-text__intro">
                    <span class="about-orc">
                        <img
                            src="{{asset('assets/img/car-radio-codes-about.jpg')}}"
                            alt="Car Radio Codes Online Decoding Service"
                        >
                    </span>
                    <p>OnlineRadioCodes.co.uk is the <b>U.K's No.1 Radio Code Company</b>.
                        First and foremost we value <a
                            href="customer-reviews.html"
                            title="Online Radio Code Reviews"
                            target="_blank"
                        >customer service</a>, it is one of our core values and why
                        we are one of the only companies to offer an <strong>100% money back guarantee</strong>. We
                        go above and
                        beyond
                        to give our customers the fastest and most knowledgeable service, rest assured your in safe
                        hands.</p>
                </div>
            </div>
        </div>
        <span class='page-updated read-more'>Page Updated: <time datetime='October 27 2021 12:17:53'>October 27,
                2021</time></span>
    </section>
    <div class="modal-popup__wrap">
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
    <div class="modal-popup__wrap" data-popup="rv">
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
                    src="{{asset('assets/vertical/dist.js')}}"
                    type="3d557a173a1d80773ff5a291-text/javascript"
                ></script>
                <div
                    id="full-page-widget"
                    style="width:100%;"
                ></div>
                <script type="3d557a173a1d80773ff5a291-text/javascript">
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
@endsection
@section('footer_content')
@endsection