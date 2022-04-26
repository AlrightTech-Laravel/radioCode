@extends('website.layout.layout')
@section('header_content')
<style>
.popular_child:nth-child(3n+1) {
    clear: left;
}
</style>
@endsection
@section('content')
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
                            <img class="product-logo" src="{{$manufacturer->brand->logo_url}}">
                            <div>
                                <span class="title is-1 is-spaced is-flex is-flex-wrap-wrap is-justify-content-center">
                                <h1 class="title is-1 is-spaced">{{$manufacturer->title}} Radio Codes</h1>
                                <div class="is-relative">
                                    <span>$<span id="ChangePrice">{{$manufacturer->price}}*</span></span>
                                    <span class="inc-vat"><b>inc VAT</b></span>
                                </div>
                                </span>
                            </div>
                        </div>
                        <p class="subtitle is-hidden-mobile">{{$manufacturer->title}} Radio Codes online service 24 hours a day 7 days a week.</p>
                        <div>
                            <form id="BuyBox" action="{{route('radio-code-order.GetSerialInfo')}}" method="post">
                            @csrf
                                <div class="field has-addons">
                                    <div class="control">
                                        <input id="radio-serial" name="serial_number" type="serial" class="input is-large rotating-placeholder" type="text" placeholder="SERIAL NUMBER">
                                        <input name="manufacturer_id" value="{{$manufacturer->id}}" type="hidden">
                                    </div>
                                <div class="control is-hidden">
                                </div>
                                <div class="control">
                                    <button class="button is-black">
                                    <span class="icon is-large"><i class="mdi mdi-arrow-right-circle-outline"></i></span>
                                    </button>
                                </div>
                                <p class="help is-danger"></p>
                                </div>
                            </form>
                        </div>
                        <div class="hero-sp">
                            <div class="is-hidden-mobile">
                                <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b6ffb0d04a076446a9af" data-businessunit-id="557f1e540000ff00058039d2" data-style-height="24px" data-style-width="100%" data-theme="light">
                                <a href="review/onlineradiocodes.co.uk.html" target="_blank" rel="noopener">Trustpilot</a>
                                </div>
                            </div>
                            <div class="is-hidden-desktop is-hidden-tablet">
                                <div class="trustpilot-widget" data-locale="en-GB" data-template-id="53aa8807dec7e10d38f59f32" data-businessunit-id="557f1e540000ff00058039d2" data-style-height="150px" data-style-width="100%" data-theme="light">
                                <a href="review/onlineradiocodes.co.uk.html" target="_blank" rel="noopener">Trustpilot</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_content')
@endsection