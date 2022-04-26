@extends('website.layout.layout')
@section('header_content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<style>
.has-text-centered {
    text-align: center !important;
}
.modal-content, .modal-card {
    margin: 0 20px;
    max-height: calc(100vh - 160px);
    overflow: auto;
    position: relative;
    width: 100%;
}
@media screen and (min-width: 769px){
    .modal-content, .modal-card {
        margin: 0 auto;
        max-height: calc(100vh - 40px);
        width: 640px;
    }
}
</style>
@endsection
@section('content')
    @if($manufacturer->count() > 0)
        <section class="hero is-white homepage is-large is-primary-gradient section-arrow next-is-light">
            <div class="container is-fluid">
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
                        <img class="logo-img" src="{{asset('assets/img/orc-inverse-logo-black.png')}}" alt="Logo">
                        </a>
                        </div>
                        <div class="navbar-menu navbar-menu-end">
                        <div class="navbar-end">
                            <div class="navbar-item has-dropdown is-hoverable is-hidden-desktop">
                                <a class="button is-black is-outlined">Contact</a>
                                @include('website.layout.mobile-header-contact')
                            </div>
                        </div>
                        </div>
                    </nav>
                </div>
                <div class="hero-body">
                    <div class="container has-text-centered">
                        <div class="columns is-centered">
                        <div class="column">
                            <div class="product-hero-info">
                                <img class="product-logo" src="{{$manufacturer[0]->brand->logo_url}}">
                                <div>
                                    <span class="title is-1 is-spaced is-flex is-flex-wrap-wrap is-justify-content-center">
                                    @if(isset($popular))
                                        <h1 class="title is-1 is-spaced">{{$manufacturer[0]->title}} Radio Codes</h1>
                                    @else
                                        <h1 class="title is-1 is-spaced">{{$manufacturer[0]->brand->name}} Radio Codes</h1>
                                    @endif
                                    <div class="is-relative">
                                        <span>£<span id="ChangePrice">{{$manufacturer[0]->price}}*</span></span>
                                    </div>
                                    </span>
                                </div>
                            </div>
                            <p class="subtitle is-hidden-mobile">{{$manufacturer[0]->brand->name}} Radio Codes online service 24 hours a day 7 days a week.</p>
                            <div>
                                {{--@if($manufacturer->count() > 1 && $manufacturer[0]->brand->name != 'Nissan')
                                    <form id="BuyBox" action="{{route('radio-code-order.GetSerialInfo')}}" method="post" accept-charset="utf-8" novalidate="">
                                        @csrf
                                        <div>
                                            <div class="is-relative">
                                                <div class="control-option option-1">
                                                    <label class="input-label" data-content="Enter Radio Serial" for="starts-with">
                                                    <span class="input-label-content">My Serial Starts With:</span><br>
                                                    </label>
                                                    <div class="select is-large">
                                                        <select id="starts-with" required="" name="manufacturer_id">
                                                            <option selected="" disabled="">-- Select an Option --</option>
                                                            @foreach($manufacturer as $each)
                                                            <option value="{{$each->id}}">{{$each->title}} ${{$each->price}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="control-option option-1">
                                                <div class="field has-addons">
                                                    <div class="control">
                                                        <input id="radio-serial" name="serial_number" type="serial" class="input is-large rotating-placeholder" type="text" placeholder="SERIAL NUMBER">
                                                    </div>
                                                <div class="control is-hidden">
                                                </div>
                                                <div class="control">
                                                    <button class="button is-black">
                                                    <span class="icon is-large"><i class="mdi mdi-arrow-right-circle-outline"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>--}}
                                @if($manufacturer->count() > 1)
                                <div id="BuyBox" class="ButtonBox">
                                    <div class="control">
                                        <button class="button is-large is-black is-outlined jb-modal" data-target="BuyModal">Select Your Radio</button>
                                    </div>
                                </div>
                                @elseif(count($manufacturer[0]->required_fields) > 0)
                                <div id="BuyBox" class="ButtonBox">
                                    <div class="control">
                                        <button class="button is-large is-black is-outlined jb-modal car-radio-select" data-target="BuyModal" data-placeholder="CL052950166112,PN2424" data-radio-amount="2">
                                            <span class="is-flex">
                                                <span>Get Code</span>
                                                <span class="icon is-medium"><i class="mdi mdi-arrow-right-circle-outline"></i></span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                @else
                                <form id="BuyBox" class="getSerialForm" action="{{ route('radio-code-order.getContactInfo') }}" method="POST">
                                    @csrf
                                    <div class="field has-addons">
                                        <div class="control">
                                            <input id="radio-serial" name="serial_number" type="serial" class="input is-large rotating-placeholder" type="text" placeholder="SERIAL NUMBER" data-placeholder="{{$manufacturer[0]->sample_serials}}, Serial Number">
                                        </div>
                                    <div class="control is-hidden">
                                        <input type="hidden" value="{{$manufacturer[0]->id}}" name="manufacturer_id">
                                    </div>
                                    <div class="control">
                                        <button type="button" onclick="submitFormWithSerial()" id="submit_get_radio_code_form" class="button is-black jb-modal">
                                            <span class="icon is-large"><i class="mdi mdi-arrow-right-circle-outline"></i></span>
                                        </button>
                                    </div>
                                    </div>
                                    <div class="under-buy-box">
                                        <div>
                                            <span id="wait_time_display"></span>
                                        </div>
                                    <div>
                                </form>
                                @endif
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section is-small is-light section-arrow next-is-black">
            <div class="container is-max-desktop has-text-centered">
                <div class="columns">
                    <div class="column">
                        <h2 class="title is-2 is-spaced mb-5">How To Find Your Serial Number</h2>
                    </div>
                </div>
                <div class="columns is-centered">
                    <div class="column is-full">
                        <div class="content">
                            @foreach($manufacturer as $each)
                            <div id="FindSlider" class="swiper-container pb-6 is-clipped">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide card">
                                        <div class="swiper-container">
                                        <div class="swiper-image-part">
                                            <img class="is-radius" src="{{$each->image_url}}" alt="{{$each->title}}">
                                        </div>
                                        <div class="swiper-info-part">
                                            <div class="swiper-text has-text-left">
                                                <p class="title is-4">{{$each->title}}</p>
                                                {!! $each->description !!}
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <small style='text-transform: uppercase'><b>Page Updated: <time datetime='2022-01-13 16:42:25'>13th January 2022</time></b></small>
            </div>
        </section>
        @if(isset($popular))
        <section class="section is-small is-light">
            <div class="container has-text-centered">
                <div class="columns">
                    <div class="column">
                        <h2 class="title is-2 is-spaced mb-5">Popular Cars & Radios</h2>
                    </div>
                </div>
                <div class="row is-centered">
                    @foreach($popular as $each)
                        <div class="col-md-4 col-sm-12 mt-2">
                            <div class="card most-popular-card-container">
                            <a class="most-popular-card-link" href="{{route('radio-code-order.showPopular', $each)}}">
                                <h4 class="title is-4 most-popular-card-title">{{$each->title}}</h4>
                                <div class="most-popular-card-image"><img src="{{$each->image_url}}" alt="{{$each->title}}"></div>
                            </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        @if($manufacturer->count() > 1)
        <div id="BuyModal" class="modal">
            <div class="modal-background jb-modal-close"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                    <p id="SelectRadioTitle" class="modal-card-title">Select Your Radio</p>
                    <button class="delete jb-modal-close" data-modal='close' aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <div class="multi-radio-slider-container">
                            <div class="multi-radio-slider first-slide">
                                @foreach($manufacturer as $each)
                                    <a href="#">
                                        <div id="nissan-block{{$each->id}}" class="multi-radio-slider-item car-radio-select is-clickable-sn">
                                            <div class="image">
                                            <img src="{{$each->image_url}}" style="height:125px">
                                            </div>
                                            <div class="multi-radio-slider-item-text"><span>{{$each->title}} - {{$each->price}}</span></div>
                                        </div>
                                    </a>
                                    <script>
                                        $("#nissan-block{{$each->id}}").click(function(){
                                            getManufacturerId({{$each->id}});
                                            // $(".multi-radio-slider-container").addClass("is-active");
                                        });
                                    </script>
                                @endforeach
                            </div>
                            <div class="multi-radio-slider second-slide">
                                <!-- <div class="modal-price">
                                    <div>£<span id="PriceText">9.99</span></div>
                                </div> -->
                                <div class="slider-back-icon" onclick="backToCategory()"><span class="icon is-medium"><i class="mdi mdi-arrow-left-drop-circle"></i></span></div>
                                <form action="{{ route('radio-code-order.getContactInfo') }}" method="post" id="dynamic_form" class="nissan-buy-box">
                                @csrf
                                    <div id="nissan-buy-box">
                                        <div id="nissan_serial" class="field">
                                            <label class="label is-flex is-relative">
                                                Serial Number *
                                                <div class="slider-info-icon">
                                                    <span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span>
                                                </div>
                                                <div class="slider-info-tip">
                                                    <img class="slider-info-tip-image" src="" alt="Nissan Tooltip">
                                                </div>
                                            </label>
                                            <div class="control">
                                                <input id="radio-serial-input" class="input is-medium replace-placeholder" type="nissan" required="" name="serial_number" placeholder="BP538971317615">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field mt-4">
                                        <button onclick="submitFormWithSerialNissan()" id="submit_get_radio_code_form" type="button" class="button is-primary is-fullwidth is-medium"><span>Get Radio Code</span> <i class="mdi mdi-arrow-right-thin-circle-outline"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div id="example-images-box-modal" class="modal">
            <div class="modal-background jb-modal-close"></div>
                <div class="modal-content has-text-centered">
                    <div class="box">
                        <div class="content">
                            <img class="product-logo mb-4" src="{{$manufacturer[0]->brand->logo_url}}">
                            <p class="title is-4 text-danger">Serial Number not recognized <i class="mdi mdi-close-circle"></i></p>
                            <p class="text-uppercase font-weight-bold text-primary">
                                Example Serials
                            </p>
                            <div id="response_serials"></div>
                        </div>
                    </div>
                </div>
            <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
        </div>
        @endif
        @if($manufacturer->count() == 1)
        <div id="BuyModal" class="modal">
            hello
            <div class="modal-background jb-modal-close"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                    <p id="SelectRadioTitle" class="modal-card-title">Select Your Radio</p>
                    <button class="delete jb-modal-close" data-modal='close' aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <div class="multi-radio-slider-container is-active">
                            <div class="multi-radio-slider first-slide">
                            </div>
                            <div class="multi-radio-slider second-slide">
                                <!-- <div class="modal-price">
                                    <div>£<span id="PriceText">9.99</span></div>
                                </div> -->
                                <form action="{{ route('radio-code-order.getContactInfo') }}" method="post" id="dynamic_form" class="nissan-buy-box">
                                @csrf
                                    <div id="nissan-buy-box">
                                        <div id="nissan_serial" class="field">
                                            <label class="label is-flex is-relative">
                                                Serial Number *
                                            </label>
                                            <div class="control">
                                                <input id="radio-serial-input" class="input is-medium replace-placeholder" type="nissan" required="" name="serial_number" placeholder="BP538971317615">
                                                <input type="hidden" value="{{$manufacturer[0]->id}}" name="manufacturer_id">
                                            </div>
                                        </div>
                                        @foreach($manufacturer[0]->required_fields as $key => $each)
                                        <div id="{{$each}}" class="field">
                                            <label class="label is-flex is-relative">{{ ucwords(str_replace('_', ' ', $each)) }} <div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="{{$each}}"></div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="field mt-4">
                                        <button type="button" onclick="submitFormWithSerial()" class="button is-primary is-fullwidth is-medium"><span>Get Radio Code</span> <i class="mdi mdi-arrow-right-thin-circle-outline"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div id="example-images-box-modal" class="modal">
            <div class="modal-background jb-modal-close"></div>
                <div class="modal-content has-text-centered">
                    <div class="box">
                        <div class="content">
                            <img class="product-logo mb-4" src="{{$manufacturer[0]->brand->logo_url}}">
                            <p class="title is-4 text-danger">Serial Number not recognized <i class="mdi mdi-close-circle"></i></p>
                            <p class="text-uppercase font-weight-bold text-primary">
                                Example Serials
                            </p>
                            <div id="response_serials"></div>
                        </div>
                    </div>
                </div>
            <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
        </div>
        @endif
        <div class="product-sticky-options is-active">
            <div class="container p-0">
                <div class="product-sticky-options--desc">
                    <div class="is-hidden-mobile">
                        <h4 class="title is-4">{{$manufacturer[0]->brand->name}} Radio Codes</h4>
                        <span class="subtitle is-5"><span class="money">£{{$manufacturer[0]->price}}</span></span>
                    </div>
                    <a id="BottonToTopPage" class="button is-black is-large">
                        <span class="is-flex">
                        <span>Get Code</span>
                        <span class="icon is-medium"><i class="mdi mdi-arrow-right-circle-outline"></i></span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('footer_content')
<script src="{{asset('assets/js/product.min.js')}}"></script>
<script>
    let manufacturer_id = null;
    let required_fields = null;
    let serial = null;
    let form_data = [];
    function getManufacturerId(manufacturer){
        manufacturer_id = manufacturer;
        getRequiredFields();
    }
    function getRequiredFields(){
        $.ajax({
            type: 'GET',
            url: '/manufacturer/'+manufacturer_id,
            dataType: 'json',
            success: function (data) {
                required_fields = data.manufacturer.required_fields;
                if(data.manufacturer.required_fields == null){

                }else{
                    $.each(required_fields, function(index, field) {
                        if(field == 'part_number'){
                            $("#nissan-buy-box").append('<div id="'+field+'" class="field"><label class="label is-flex is-relative">Part Number *<div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="'+field+'"></div></div>')
                        }
                        if(field == 'model_number'){
                            $("#nissan-buy-box").append('<div id="'+field+'" class="field"><label class="label is-flex is-relative">Model Number *<div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="'+field+'" ></div></div>')
                        }
                        if(field == 'device_number'){
                            $("#nissan-buy-box").append('<div id="'+field+'" class="field"><label class="label is-flex is-relative">Device Number *<div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="'+field+'"></div></div>')
                        }
                        if(field == 'date'){
                            $("#nissan-buy-box").append('<div id="'+field+'" class="field"><label class="label is-flex is-relative">Date *<div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="'+field+'"></div></div>')
                        }
                        if(field == 'security_code'){
                            $("#nissan-buy-box").append('<div id="'+field+'" class="field"><label class="label is-flex is-relative">Security Code *<div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="'+field+'"></div></div>')
                        }
                        if(field == 'vin_number'){
                            $("#nissan-buy-box").append('<div id="'+field+'" class="field"><label class="label is-flex is-relative">Vin Number *<div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="'+field+'"></div></div>')
                        }
                    });
                    $("#nissan-buy-box").append('<div id="manufacturer_'+manufacturer_id+'_field"><input value="'+manufacturer_id+'" type="hidden" required="" name="manufacturer_id"></div>')
                    $(".multi-radio-slider-container").addClass("is-active");
                }
            },error:function(){
                console.log(data);
            }
        });
    }
    function backToCategory(){
        $(".slider-back-icon").click(function(){
            $.each(required_fields, function(index, field) {
                if(field == 'part_number'){
                    $("#"+field).remove();
                }
                if(field == 'model_number'){
                    $("#"+field).remove();
                }
                if(field == 'device_number'){
                    $("#"+field).remove();
                }
                if(field == 'date'){
                    $("#"+field).remove();
                }
                if(field == 'security_code'){
                    $("#"+field).remove();
                }
                if(field == 'vin_number'){
                    $("#"+field).remove();
                }
                $("#nissan_email").remove();
                $("#manufacturer_"+manufacturer_id+"_field").remove();
            });
            $(".multi-radio-slider-container").removeClass("is-active");
        });
    }
    function submitFormWithSerialNissan(){
        // var route = "{{ route('radio-code-order.getContactInfo','') }}";
        var route = "https://gotlr.stackup.solutions/contact-information";
        var form = $('#dynamic_form')[0];
        // Create an FormData object
        var data = new FormData(form);
        // If you want to add an extra field for the FormData
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: route,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                if(data.serials){
                    var old_Modal = document.getElementById('response_serials');
                    old_Modal.innerHTML = "";
                    $.each(data.serials, function(index, serial) {
                        $("#response_serials").append("<p>"+serial.serial_number+"</p>");
                    });
                    $("#example-images-box-modal").addClass("is-active");
                }
                else{
                    document.getElementById("dynamic_form").submit();
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
    function submitFormWithSerial(){
        // var route = "{{ route('radio-code-order.getContactInfo','') }}";
        var route = "https://gotlr.stackup.solutions/contact-information";
        var form = $('#dynamic_form')[0];
        // Create an FormData object
        var data = new FormData(form);
        // If you want to add an extra field for the FormData
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: route,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
                console.log(data)
                if(data.serials){
                    var old_Modal = document.getElementById('response_serials');
                    old_Modal.innerHTML = "";
                    $.each(data.serials, function(index, serial) {
                        $("#response_serials").append("<p>"+serial.serial_number+"</p>");
                    });
                    $("#example-images-box-modal").addClass("is-active");
                }
                else{
                    document.getElementById("dynamic_form").submit();
                    // if(data.manufacturer.required_fields.length === 0){
                    // }
                    // else{
                    //     $.each(data.manufacturer.required_fields, function(index, field) {
                    //         if(field == 'part_number'){
                    //             $("#"+field).remove();
                    //         }
                    //         if(field == 'model_number'){
                    //             $("#"+field).remove();
                    //         }
                    //         if(field == 'device_number'){
                    //             $("#"+field).remove();
                    //         }
                    //         if(field == 'date'){
                    //             $("#"+field).remove();
                    //         }
                    //         if(field == 'security_code'){
                    //             $("#"+field).remove();
                    //         }
                    //         if(field == 'vin_number'){
                    //             $("#"+field).remove();
                    //         }
                    //     });
                    //     $.each(data.manufacturer.required_fields, function(index, field) {
                    //         if(field == 'part_number'){
                    //             $("#nissan-buy-box").append('<div id="'+field+'" class="field"><label class="label is-flex is-relative">Part Number *<div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="'+field+'"></div></div>')
                    //         }
                    //         if(field == 'model_number'){
                    //             $("#nissan-buy-box").append('<div id="'+field+'" class="field"><label class="label is-flex is-relative">Model Number *<div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="'+field+'" ></div></div>')
                    //         }
                    //         if(field == 'device_number'){
                    //             $("#nissan-buy-box").append('<div id="'+field+'" class="field"><label class="label is-flex is-relative">Device Number *<div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="'+field+'"></div></div>')
                    //         }
                    //         if(field == 'date'){
                    //             $("#nissan-buy-box").append('<div id="'+field+'" class="field"><label class="label is-flex is-relative">Date *<div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="'+field+'"></div></div>')
                    //         }
                    //         if(field == 'security_code'){
                    //             $("#nissan-buy-box").append('<div id="'+field+'" class="field"><label class="label is-flex is-relative">Security Code *<div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="'+field+'"></div></div>')
                    //         }
                    //         if(field == 'vin_number'){
                    //             $("#nissan-buy-box").append('<div id="'+field+'" class="field"><label class="label is-flex is-relative">Vin Number *<div class="slider-info-icon"><span class="icon is-medium"><i class="mdi mdi-help-circle-outline"></i></span></div><div class="slider-info-tip"><img class="slider-info-tip-image" src="" alt="Nissan Tooltip"></div></label><div class="control"><input id="radio-serial" class="input is-medium replace-placeholder" type="nissan" required="" name="'+field+'"></div></div>')
                    //         }
                    //     });
                    //     $("#BuyModal").addClass("is-active");
                    // }
                }
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
    $(document).ready(function () {
        $("#radio-serial").change(function(){
            var serial = $("#radio-serial").val();
            $('#radio-serial-input').val(serial);
        });
        document.getElementById("BottonToTopPage").addEventListener("click", function(e) {
            var t = document.getElementById("MainSerial");
            window.scroll({
                top: 0,
                left: 0,
                behavior: "smooth"
            }), t && t.focus()
        })
        const manufacturerDeliveryTime = "{{$manufacturer[0]->hours}}";
        const timeArray = manufacturerDeliveryTime.split("-");
        const today_date = new Date();
        let time = today_date.toLocaleTimeString([], { hour: '2-digit', hour12: false });
        console.log(time);
        console.log(timeArray[0]);
        console.log(timeArray[1]);
        if(time >= timeArray[0] && time <= timeArray[1]){
            document.getElementById("wait_time_display").innerHTML = "Available Today Unlocked  {{$manufacturer[0]->delivery_time}}";
        }
    });

</script>
@endsection