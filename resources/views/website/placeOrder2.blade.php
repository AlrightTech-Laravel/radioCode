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
<div class="row" id="row-main">
	<div class="col-lg-5 col-md-5" id="map-container" >
		<div id="main-img">
            <img src="{{$manufacturer->image_url}}" alt=""/>
        </div><!-- End main-img -->
	</div><!-- End map-container -->
    <div class="col-lg-7 col-lg-offset-5 col-md-7 col-md-offset-5">
        <div class="row" id="content-row" style="margin-top:15px">
            <div class="col-lg-8 col-md-12">
            <h1>Radio Code Avalible</h1>
            <p class="lead">
                Cu affert populo neglegentur has, labore nostrum periculis ius in, singulis electram ad vel labore nostrum periculis ius in.
            </p>
            <hr>
            <form action="{{ route('radio-code-order.store-order', $manufacturer) }}" method="POST" enctype="multipart/form-data" id="contactform">
            @csrf
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <div class="serial">
                                @if(request()->input('serial_number'))
                                    <p><span>Serial No: </span>{{ request()->input('serial_number') }}</p>
                                    <input type="hidden" name="serial_number" value="{{ request()->input('serial_number') }}">
                                @endif
                                <p><span>Price: </span>${{ $manufacturer->price }}</p>
                                <p><span>Delivery Time: </span>{{ $manufacturer->delivery_time }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="name">Enter Your Name:</label>
                            <input type="name" class="form-control style_2 required" name="name" class="form-control" placeholder="John Doe" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="email">Enter Your Email Addres:</label>
                            <input type="email" class="form-control style_2 required" name="email" id="email" class="form-control" placeholder="john@gmail.com" required>
                            <small id="emailHelpBlock" class="form-text text-muted">
                                Enter the email on which you will recieve your decoded code.
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if ($manufacturer->required_fields)
                        @foreach ($manufacturer->required_fields as $field)
                        @php
                            $label = \App\Models\Manufacturer::$requiredFields[$field];
                        @endphp
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="{{ $field }}">Enter {{ $label }}:</label>
                                <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control" placeholder="Enter here" required>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    @if(!request()->input('serial_number'))
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="image">Reference Image</label>
                                <input type="file" name="reference_image" id="reference_image" accept="image/png,image/jpeg,image/jpg" required>
                            </div>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" value="Place Order" class=" btn btn-info center-block" id="submit-contact"/>
                        </div>
                    </div>
                </div>
            </form>
            </div><!-- End col-md-8 -->
        </div>
    </div>
</div>
@endsection
@section('footer_content')
@endsection