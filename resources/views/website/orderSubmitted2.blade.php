@extends('website.layout.layout')
@section('header_content')
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
@endsection
@section('content')
<section
			class="seperator-top"
			style="background: none"
		>
        <div class="row wrap-it-up" id="row-main">
            <div class="col-lg-5 col-md-5" id="map-container" >
                <div id="main-img">
                    <img src="{{$manufacturer->image_url ?? asset('assets/img/01.jpg')}}" alt=""/>
                </div><!-- End main-img -->
            </div><!-- End map-container -->
            <div class="col-lg-7 col-lg-offset-5 col-md-7 col-md-offset-5">
                <div class="row" id="content-row" style="margin-top:15px">
                    <div class="box-sidebar">
                        <h3>Your order has been submitted!</h3>
                        @if($order->radio_code)
                            <p>Your instant radio code is ready.</p>
                            <input type="text" class="form-control style_2" value="{{ $order->radio_code }}" readonly>
                        @else
                            <p>Your order has been submitted and will be reviews buy our staff. After your radio code has been decoded, you will recieve an email on you provided email address containing your radio code.</p>
                        @endif
                    </div><!-- End box-sidebar -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_content')
@endsection