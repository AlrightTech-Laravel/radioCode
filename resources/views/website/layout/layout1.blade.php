<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Presenter - Multipurpose Showcase</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons-->
    <link rel="shortcut icon" href="../presenter/img/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" type="image/x-icon" href="../presenter/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="../presenter/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="../presenter/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="../presenter/img/apple-touch-icon-144x144-precomposed.png">
    <!-- CSS -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/megamenu.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/magnific-popup.css')}}" rel="stylesheet" >
    <link href="{{asset('assets/fontello/css/fontello.css')}}" rel="stylesheet" >
    <link href="{{asset('assets/css/flexslider.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/slider.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="http://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<!-- Facebook Share details -->
<meta property="og:title" content="GetMyRadioCode  | Multipurpose Showcase" />
<meta property="og:type" content="product" />
<!-- <meta property="og:url" content="http://www.ansonika.com/presenter/" /> -->
<!-- <meta property="og:image" content="../presenter/presenter.jpg" /> -->
<meta property="og:site_name" content="GetMyRadioCode  | Radio Codes" />
<meta property="og:description" content="Get Radio Code of Multiple Brands" />
<!-- <meta property="fb:app_id" content="399420516869796" /> -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11097556-8']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
@yield('header_content')
  </head>
  <body>
<!-- Preloader -->
<div id="preloader">
	<div id="status"><img src="{{asset('assets/img/favicon.png')}}" alt=""></div>
</div>
<!--  end Preloader -->
 <div id="main-wrapper">
	<!-- Header Start -->
	@include('website.layout.header')
	<!-- Header End -->
    <!-- Main Start -->
    @yield('content')
	<!-- Main End -->
</div><!-- End main-wrapper  -->
<!-- JQUERY -->
<script src="{{asset('assets/js/jquery-1.10.2.min.js')}}"></script>
<!-- FlexSlider -->
<script src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('assets/js/slider_func.js')}}"></script>
<!-- OTHER JS -->
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/retina.min.js')}}"></script>
<script src="{{asset('assets/js/functions.js')}}"></script>
@yield('footer_content')
  </body>
</html>