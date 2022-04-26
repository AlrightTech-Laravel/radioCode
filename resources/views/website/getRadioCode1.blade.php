@extends('website.layout.layout')
@section('header_content')
@endsection
@section('content')
<div class="row" id="row-main">
    <div class="col-lg-5 col-md-5" id="main-img-container">
        <div id="main-img">
            <img src="{{$manufacturer[0]->image_url ?? asset('assets/img/01.jpg')}}" alt=""/>
            <div class="gallery">
                @if(isset($manufacturer))
                    @foreach($manufacturer as $each)
                    <a href="{{$each->image_url}}" class="gal-bt" title="{{$each->title}}"><i class="icon-camera-1"></i> Gallery</a>
                    @endforeach
                @endif
            </div><!-- End gallery -->
        </div><!-- End main-img -->
    </div><!-- End main-img-container -->
    <div class="col-lg-7 col-lg-offset-5 col-md-7 col-md-offset-5">
        <div class="row" id="content-row">
            <div id="share">
                <!-- <div id="suggest_friend"><a href="#" >Suggest this site to a friend</a></div> -->
                <div class="fb-like" data-send="false" data-layout="button_count" data-width="280" data-show-faces="true"></div>
                <div class="twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-via="Ansonika">Tweet</a></div>
            </div>
            <div class="col-lg-8 col-md-12">
                @if(isset($manufacturer) && $manufacturer->count() > 0)
                    @foreach($manufacturer as $each)
                    <h1>{{$each->title}}</h1>
                    <p class="lead">
                        {{$each->brand->name}}
                    </p>
                    <p>
                        {!! $each->description !!}
                    </p>
                    <hr>
                    <div id="features">
                        <ul>
                            <li><a href="javascript:void(0)" class="tooltip-2" data-placement="top" title="Lorem ipsum dolor sit amet, alienum postulant principes et vis, posse viderer."><i class="icon-key-1"></i></a></li>
                            <li><a href="javascript:void(0)" class="tooltip-2" data-placement="top" title="Lorem ipsum dolor sit amet, alienum postulant principes et vis, posse viderer."><i class="icon-cog-7"></i></a></li>
                            <li><a href="javascript:void(0)" data-placement="top" title="Lorem ipsum dolor sit amet, alienum postulant principes et vis, posse viderer."><i class="icon-buffer"></i></a></li>
                            <li><a href="javascript:void(0)" class="tooltip-2" data-placement="top" title="Lorem ipsum dolor sit amet, alienum postulant principes et vis, posse viderer."><i class="icon-wrench"></i></a></li>
                            <li><a href="javascript:void(0)"  class="tooltip-2" data-placement="top" title="Lorem ipsum dolor sit amet, alienum postulant principes et vis, posse viderer."><i class="icon-king"></i></a></li>
                        </ul>
                    </div>
                    <hr style="margin-top:10px">
                    @endforeach
                @endif
            </div>
            @if(isset($manufacturer) && $manufacturer->count() > 0)
                <aside class="col-lg-4 col-md-12">
                <div class="box-sidebar">
                    <h3>Enter Serial Number</h3>
                    <form role="form" action="{{ route('radio-code-order.place-order' ,$manufacturer[0]) }}" id="detail_page_form" autocomplete="off">
                        <div class="form-group">
                            <input type="text" class="form-control required" id="name_detail" name="serial_number" placeholder="Enter Serial or Vehicle manufacturer e.g. M123456">
                            @error('serail_number')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <a href="{{ route('radio-code-order.place-order', $manufacturer[0]) }}" type="button" class="btn btn-info">Upload Image</a>
                            <button type="submit" class="btn btn-info" id="submit-visit">Radio Code</button>
                        </div>
                    </form>
                </div><!-- End box-sidebar -->
                <div class="box-sidebar">
                    <h3>Additiona info</h3>
                    <p>
                        Lorem ipsum dolor sit amet, usu no quem omnes, fugit nominati antiopam mea et, ne quot fastidii vituperata vel.
                    </p>
                </div><!-- End box-sidebar -->
                </aside>
            @endif
        </div><!-- End content -->
    </div><!-- End row -->
</div><!-- End main-row -->
@endsection
@section('footer_content')
@endsection