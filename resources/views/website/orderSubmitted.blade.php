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
                            <div class="icon is-large"><i class="mdi mdi-forwardburger"></i></div>
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
        </div>
    </section>
    <section class="section is-small is-light">
        <div class="container has-text-centered">
            <div class="columns">
                <div class="column">
                    <h3>Your order has been submitted!</h3>
                    @if($order->radio_code)
                        <p>Your instant radio code is ready.</p>
                        <input type="text" class="form-control style_2" value="{{ $order->radio_code }}" readonly>
                    @else
                        <p>Your order has been submitted and will be reviews by our staff. After your radio code has been decoded, you will recieve an email on you provided email address containing your radio code.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_content')
@endsection