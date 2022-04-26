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
        <div class="wrap-it-up">
                <div class="col-lg-5 col-md-5" id="map-container" >
                    <div id="main-img" style="text-align: center">
                        <img src="{{$serial->manufacturer->image_url}}" style="width: 50%;" alt=""/>
                    </div>
                </div>
                <div class="two-wrap__2020">
                    <div>
                        <h3>Radio Code Avalible</h3>
                        <form action="{{ route('radio-code-order.store-order', $serial->manufacturer) }}" method="POST" enctype="multipart/form-data" id="contactform">
                            @csrf
                            <div class="form-group two">
                                @if(request()->input('serial_number'))
                                <p><span>Serial No: </span>{{ request()->input('serial_number') }}</p>
                                <input type="hidden" name="serial_number" value="{{ request()->input('serial_number') }}">
                                @endif
                                <p><span>Price: </span>${{ $serial->price }}</p>
                                <p><span>Delivery Time: </span>{{ $serial->timing_msg }}</p>
                            </div>
                            <div class="form-group two">
                                    @if ($serial->required_fields)
                                    @foreach ($serial->required_fields as $field)
                                    @php
                                        $label = \App\Models\Serials::$requiredFields[$field];
                                    @endphp
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="{{ $field }}">Enter {{ $label }}:</label>
                                            <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control" placeholder="Enter here" required>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                    <!-- <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Enter Name:</label>
                                            <input type="name" class="form-control style_2 required" name="name" class="form-control" placeholder="John Doe" required>
                                        </div>
                                    </div> -->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Enter Email:</label>
                                            <input type="email" class="form-control style_2 required" name="email" id="email" class="form-control" placeholder="john@gmail.com" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="image">Reference Image</label>
                                            <input type="file" name="reference_image" id="reference_image" accept="image/png,image/jpeg,image/jpg">
                                        </div>
                                    </div>
                            </div>
                            <button
                                type="submit"
                                class="btn__std btn__std--fill-orange"
                            >Get Code</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('footer_content')
@endsection