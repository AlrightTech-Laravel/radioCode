<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from www.onlineradiocodes.co.uk/checkout/contact-information.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 19:42:10 GMT -->
   <!-- Added by HTTrack -->
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <!-- /Added by HTTrack -->
   <head>
      <title>Contact Information | getmyradiocode.co.uk</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">
      <link rel="mask-icon" href="{{asset('assets/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
      <meta name="msapplication-TileColor" content="#ff0000">
      <meta name="theme-color" content="#FF7C02">
      <link rel="stylesheet" href="{{asset('assets/css/main.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/checkout.css')}}">
   </head>
   <body class="site-body">
      <div id="PageContainer">
      <div class="checkout__wrapper">
         <div id="Main" class="main__page--content">
            <header id="SmallHeader">
               <div class="small-header__wrap">
                  <div>
                     <i class="mdi mdi-lock"></i>
                     <div class="medium-hide">Secure Checkout</div>
                  </div>
                  <div class="logo"><a href="{{route('home')}}"><img src="{{asset('assets/img/orc-inverse-logo-black.png')}}" alt="Online Radio Codes"></a></div>
                  <div>
                     <a href="tel:01942604333">
                        <i class="mdi mdi-phone-outline"></i>
                        <div class="medium-hide">01942 604 333</div>
                     </a>
                  </div>
               </div>
               <div>
                  <div class="top-bar bg-texture owl-theme" id="owlCarouselPreHeader">
                     <div class="msg left-msg mobilePreHeadSlider owl-lazy">
                        <p><i class="mdi mdi-shield"></i>100% Money Back Guarantee!</p>
                     </div>
                     <div class="msg center-msg mobilePreHeadSlider owl-lazy">
                        <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b6ffb0d04a076446a9af" data-businessunit-id="557f1e540000ff00058039d2" data-style-height="20px" data-style-width="100%" data-theme="dark">
                           <a href="https://uk.trustpilot.com/review/onlineradiocodes.co.uk" target="_blank">Trustpilot</a>
                        </div>
                     </div>
                     <div class="msg right-msg mobilePreHeadSlider owl-lazy">
                        <p class="mb-hide"><i class="mdi mdi-account-multiple"></i>Over 350,000 Happy Customers</p>
                     </div>
                  </div>
               </div>
            </header>
            <div class="order-summary__mobile">
               <button class="order-summary__btn slideBtn" data-tog-slide="order-summary">
               <span> <span> - $</span>{{$order->price}} <i class="mdi mdi-chevron-down"></i></span>
               </button>
               <div id="Summary_Mobile" class="summary-sec__mobile summary-sec slideContent" data-tog-slide="order-summary">
                  <div class="order-summary__content">
                     <div class="option__summary">
                        <form action="#">
                           <fieldset>
                              <div class="editable-fields">
                                 <label for="serial">Serial Number</label>
                                 <span>
                                 <input id="serial" autocomplete="off" name="serial" type="text" placeholder="Serial Number..." value="{{$order->serial_number}}">
                                 </span>
                              </div>
                           </fieldset>
                        </form>
                     </div>
                  </div>
                  <div id="OrderSummary">
                     <span class="line-total">
                     <span>Subtotal</span>
                     <span class="price__wrap"><span class="currency">$</span><span class="price subtotal">
                     {{$order->price}} (Instant Available)</span></span>
                     </span>
                     <span class="line-total main-total">
                     <span>Total</span>
                     <span class="price__wrap"><span class="currency">$</span><span class="price">{{$order->price}}
                     </span></span>
                     </span>
                  </div>
               </div>
            </div>
            <main>
               <div class="step-counters">
                  <span class="active">Information</span>
                  <i class="mdi mdi-chevron-right"></i>
                  <span>Payment</span>
               </div>
               <div id="remainingTime" class="step-counters mt-5" style="font-size: 40px !important;"></div>
               <div class="payment-form non-material__form">
                  <div class="instruction__wrap">
                     <p class="instruction">Your order has been submitted!</p>
                  </div>
                  @if($order->radio_code)
                     <p>Your instant radio code is ready.</p>
                     <form action="{{route('create_checkout_session')}}" method="post" id="payment-form">
                           @csrf
                           <div class="editable-fields">
                              <span>
                              <input id="email" autocomplete="on" name="email" required type="hidden" value="{{$order->email}}">
                              </span>
                           </div>
                           <div>
                              <input class="userval" type="hidden" name="order" value="{{$order->id}}">
                           </div>
                           <div class="pay-secure__wrap">
                              <button id="pay-secure" class="btn__std btn__std--green" type="submit"><i class="fa fa-lock"></i><span>Continue To Payment</span></button>
                           </div>
                     </form>
                  @else
                     <p>Your order has been submitted and will be reviews by our staff. After your radio code has been decoded, you will recieve an email on you provided email address containing your radio code.</p>
                  @endif
               </div>
               <div class="trustpilot-widget dt-hide mb-show" data-locale="en-GB" data-template-id="53aa8807dec7e10d38f59f32" style="margin-top: 2.22222rem" data-businessunit-id="557f1e540000ff00058039d2" data-style-height="150px" data-style-width="100%" data-theme="light">
                  <a href="https://uk.trustpilot.com/review/onlineradiocodes.co.uk" target="_blank" rel="noopener">Trustpilot</a>
               </div>
            </main>
         </div>
         <div id="Summary" class="summary-sec">
            <div class="order-summary__header">
               <h2>Order Summary</h2>
            </div>
            <div class="scroller">
               <div class="order-summary__content">
                  <div class="option__summary">
                     <h1><img src="https://www.onlineradiocodes.co.uk/img/.svg" alt=""><span></span></h1>
                     <form class="UpdateUserInfoForm">
                        <fieldset>
                           <div class="editable-fields">
                              <label for="serial">Serial Number</label>
                              <span>
                              <input id="serial" autocomplete="off" name="serial" type="text" placeholder="Serial Number..." value="{{$order->serial_number}}">
                              </span>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <div id="OrderSummary">
                  <span class="line-total">
                  <span>Subtotal</span>
                  <span class="price__wrap"><span class="currency">$</span><span class="price subtotal">{{$order->price}} </span></span>
                  </span>
                  <span class="line-total main-total">
                  <span>Total</span>
                  @if($order->radio_code != null)
                  <span style="font-size: xx-small;">(Instant Code Available)</span>
                  @endif
                  <span class="price__wrap"><span class="currency">$</span><span class="price" id="priceIncVAT">{{$order->price}}</span></span>
                  </span>
               </div>
            </div>
         </div>
      </div>
      <script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="2b8fa27720941cb5e433a2a8-text/javascript"></script>
      <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="2b8fa27720941cb5e433a2a8-|49" defer=""></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script>
         function Timer(duration, display)
         {
            var timer = duration, hours, minutes, seconds;
            setInterval(function () {
               hours = parseInt((timer /3600)%24, 10)
               minutes = parseInt((timer / 60)%60, 10)
               seconds = parseInt(timer % 60, 10);

                     hours = hours < 10 ? "0" + hours : hours;
               minutes = minutes < 10 ? "0" + minutes : minutes;
               seconds = seconds < 10 ? "0" + seconds : seconds;

               display.text(hours +":"+minutes + ":" + seconds);

                     --timer;
            }, 1000);
         }

         jQuery(function ($)
         {
            var twentyFourHours = 24 * 60 * 60;
            var display = $('#remainingTime');
            Timer(twentyFourHours, display);
         });
      </script>
   </body>
   <!-- Mirrored from www.onlineradiocodes.co.uk/checkout/contact-information.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 19:42:19 GMT -->
</html>