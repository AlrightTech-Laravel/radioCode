@extends('website.layout.layout')
@section('header_content')
@endsection
@section('content')
<div class="col-lg-5 col-md-5" id="map-container" >
    <div id="main-img">
        <img src="{{$manufacturer->image_url ?? asset('assets/img/01.jpg')}}" alt=""/>
    </div><!-- End main-img -->
</div><!-- End map-container -->
<div class="col-lg-7 col-lg-offset-5 col-md-7 col-md-offset-5">
    <div class="row" id="content-row"  >
        <div id="share">
            <div id="fb-root"></div>
            <!-- <div id="suggest_friend"><a href="#" data-toggle="modal" data-target="#myModal">Suggest this site to a friend</a></div> -->
            <div class="fb-like" data-send="false" data-layout="button_count" data-width="280" data-show-faces="true"></div>
            <div class="twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-via="Ansonika">Tweet</a></div>
        </div>
        <div class="col-lg-8 col-md-12">
            <h1>Send Us a Message</h1>
            <hr>
            @if(session()->has('success_message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success_message') }}
                </div>
            @endif
            @if(session()->has('error_message'))
                <div class="alert alert-error" role="alert">
                    {{ session()->get('error_message') }}
                </div>
            @endif
            <form method="post" action="../presenter/assets/contact.html" id="contactform">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" class="form-control style_2 required" value="{{ old('name') }}" id="name_contact" name="name" placeholder="Enter Name">
                            @error('name')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <input type="email" class="form-control style_2 required" value="{{ old('email') }}" id="lastname_contact" name="email" placeholder="Enter Email">
                            @error('email')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="email" id="email_contact" name="subject"  class="form-control style_2 required email" value="{{ old('subject') }}" placeholder="Enter Subject">
                            @error('subject')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea rows="5" id="message_contact" name="message" class="form-control style_2 required" placeholder="Write your message"></textarea>
                            @error('message')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" value="Submit" class=" btn btn-info center-block" id="submit-contact"/>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- End col-md-8 -->
        <aside class="col-lg-4 col-md-12">
        <article class="box-sidebar">
        <h3>Address</h3>
        <ul id="contact-info">
            <li><i class="icon-home"></i> 11 Fifth Ave - NJ, US</li>
            <li><i class="icon-phone"></i> + 61 (2) 8093 3400</li>
            <li><i class=" icon-email"></i> <a href="#">info@domain.com</a></li>
        </ul>
        <form action="http://maps.google.com/maps" method="get" target="_blank">
            <div class="input-group">
                <input type="text" name="saddr" placeholder="Enter your location" class="form-control"/>
                <input type="hidden" name="daddr" value="New York, NY 11430"/><!-- Write here your end point -->
                <span class="input-group-btn">
                <button class="btn btn-default" type="submit" value="Get directions"><i class="icon-search"></i></button>
                </span>
            </div><!-- /input-group -->
        </form>
        </article><!-- End box-sidebar -->
        <article class="box-sidebar">
        <h3>Follow us</h3>
        <p>Cu affert populo neglegentur has, labore nostrum periculis ius in, singulis electram ad vel labore.</p>
        <ul id="contact_follow">
            <li><a href="#"><span class=" icon-dribbble"></span></a></li>
            <li><a href="#"><span class="icon-facebook"></span></a></li>
            <li><a href="#"><span class="icon-twitter"></span></a></li>
            <li><a href="#"><span class=" icon-googleplus"></span></a></li>
        </ul>
        </article><!-- End box-sidebar -->
        </aside>
    </div><!-- End content -->
</div><!-- End row -->
@endsection
@section('footer_content')
@endsection