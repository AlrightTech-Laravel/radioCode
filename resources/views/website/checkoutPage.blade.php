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
               <span> <span> - $</span>{{$is_serial->price}} <i class="mdi mdi-chevron-down"></i></span>
               </button>
               <div id="Summary_Mobile" class="summary-sec__mobile summary-sec slideContent" data-tog-slide="order-summary">
                  <div class="order-summary__content">
                     <div class="option__summary">
                        <form action="#">
                           <fieldset>
                              <div class="editable-fields">
                                 <label for="serial">Serial Number</label>
                                 <span>
                                 <input id="serial" autocomplete="off" name="serial" type="text" placeholder="Serial Number..." value="{{$serial}}">
                                 </span>
                              </div>
                           </fieldset>
                        </form>
                     </div>
                  </div>
                  <div id="OrderSummary">
                     <span class="line-total">
                     <span>Subtotal</span>
                     <span class="price__wrap"><span class="currency">£</span><span class="price subtotal">
                     {{$is_serial->price}} (Instant Available)</span></span>
                     </span>
                     <span class="line-total main-total">
                     <span>Total</span>
                     <span class="price__wrap"><span class="currency">£</span><span class="price">{{$is_serial->price}}
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
               <div class="payment-form non-material__form">
                  <div class="instruction__wrap">
                     <p class="instruction">Please enter your email address below</p>
                  </div>
                  <form action="{{route('create_order')}}" method="post" id="payment-form">
                     @csrf
                     <div class="editable-fields">
                        <label for="email">Email Address</label>
                        <span>
                        <input id="email" autocomplete="on" name="email" required type="text" placeholder="Please enter an email address..." value="">
                        </span>
                     </div>
                     <div>
                        <input class="userval" type="hidden" name="serial" value="{{$serial}}">
                        <input class="userval" type="hidden" name="manufacturer_id" value="{{$manufacturer->id}}">
                        <input class="userval" type="hidden" name="amount" value="{{$is_serial->price}}">
                        @if($instant_radio_code != null)
                        <input class="userval" type="hidden" name="instant_radio_code" value="{{$instant_radio_code->serial_number}}">
                        @endif
                        @if($device_number != null)
                        <input class="userval" type="hidden" name="device_number" value="{{$device_number}}">
                        @endif
                        @if($part_number != null)
                        <input class="userval" type="hidden" name="part_number" value="{{$part_number}}">
                        @endif
                        @if($model_number != null)
                        <input class="userval" type="hidden" name="model_number" value="{{$model_number}}">
                        @endif
                        @if($date != null)
                        <input class="userval" type="hidden" name="date" value="{{$date}}">
                        @endif
                        @if($security_code != null)
                        <input class="userval" type="hidden" name="security_code" value="{{$security_code}}">
                        @endif
                        @if($vin_number != null)
                        <input class="userval" type="hidden" name="vin_number" value="{{$vin_number}}">
                        @endif
                     </div>
                     <div class="pay-secure__wrap">
                        <button id="pay-secure" class="btn__std btn__std--green" type="submit"><i class="fa fa-lock"></i><span>Get Code</span></button>
                     </div>
                  </form>
                  <footer id="SmallFooter" class="checkout__footer">
                     <div class="learn-more">
                        <div class="learn-more__top">
                           <img src="https://www.onlineradiocodes.co.uk/img/icon-safety.svg">
                           <span>Your email address is safe.</span>
                        </div>
                        <div class="learn-more__btn">Learn more</div>
                        <div class="learn-more__content">
                           <span>Your email address will not be published, and your email address will not be shared with any
                           outside organizations or individuals. Most of our decodes are displayed instantly. We require your
                           email to send confirmation of purchase, invoice and to send your radio code.</span>
                        </div>
                     </div>
                  </footer>
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
                              <input id="serial" autocomplete="off" name="serial" type="text" placeholder="Serial Number..." value="{{$serial}}">
                              </span>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <div id="OrderSummary">
                  <span class="line-total">
                  <span>Subtotal</span>
                  <span class="price__wrap"><span class="currency">$</span><span class="price subtotal">{{$is_serial->price}} </span></span>
                  </span>
                  <span class="line-total main-total">
                  <span>Total</span>
                  @if($instant_radio_code == true)
                  <span style="font-size: xx-small;">(Instant Code Available)</span>
                  @endif
                  <span class="price__wrap"><span class="currency">$</span><span class="price" id="priceIncVAT">{{$is_serial->price}}</span></span>
                  </span>
               </div>
            </div>
         </div>
      </div>
      <script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="2b8fa27720941cb5e433a2a8-text/javascript"></script>
      <script type="2b8fa27720941cb5e433a2a8-text/javascript">
         $('.edit').on('click', function (event) {
           event.preventDefault();
           var $this = $(this);

           $this.siblings('input').attr('disabled', false);
           $('.apply').attr('disabled', false);
         });

         $('.slideBtn').on('click', function (e) {
           e.preventDefault();
           var $this = $(this);
           $('.slideContent').slideToggle();
           $this.find('.caret-down').toggleClass('opened');
         });

         $('#paypal__btn').on('click', function (e) {
           $('#buy-box')[0].submit();
         });

         $('.UpdateUserInfoForm').on('submit', function (e) {
           e.preventDefault();
           var changedInputs = $(this).find('input'),
             newInputs = $('#payment-form').find('.userval');

           for (var i = 0; i < changedInputs.length; i++) {
             values = $(changedInputs[i]).val();
             $(newInputs[i]).val(values);
           }

           $('.fa-check').fadeIn(500).delay(2000).fadeOut(500, function () {
             $(this).hide();
           });
         });

         var now = new Date(),
           day = now.getDay(),
           time = now.getHours();

         if ((time >= 9 && time < 17) && (day >= 1 && day <= 5)) {

           var usrLocation = $(location).attr('pathname').substring(1),
             pathReg = /\w*/g,
             pageLoc = pathReg.exec(usrLocation);

           $('.time-to-show').show();
         } else {
           $('#addOr').after('<small id="or-option">OR</small>');
           $('.hr-to-hide').hide();
           $('.time-to-show').hide();
         }

         $('.learn-more__btn').on('click', function () {
           $('.learn-more__content').slideToggle();
         });

      </script>
      <script type="2b8fa27720941cb5e433a2a8-text/javascript">
         (function (h, o, t, j, a, r) {
           h.hj = h.hj || function () {
             (h.hj.q = h.hj.q || []).push(arguments)
           };
           h._hjSettings = {
             hjid: 475243,
             hjsv: 5
           };
           a = o.getElementsByTagName('head')[0];
           r = o.createElement('script');
           r.async = 1;
           r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
           a.appendChild(r);
         })(window, document, '//static.hotjar.com/c/hotjar-', '.js?sv=');

      </script>
      <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="2b8fa27720941cb5e433a2a8-|49" defer=""></script>
   </body>
   <!-- Mirrored from www.onlineradiocodes.co.uk/checkout/contact-information.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Jan 2022 19:42:19 GMT -->
</html>