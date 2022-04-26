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
        </div>
    </section>
    <section class="section is-small is-light">
        <div class="container has-text-centered">
            <div class="columns">
                <div class="column">
                    <form class="nissan-buy-box" method="post" action="{{ route('radio-code-order.store-order', $manufacturer) }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($serial))
                            <div class="field">
                                <label class="label is-flex is-relative">
                                    Serial Number *
                                </label>
                                <div class="control">
                                    <input id="radio-serial" disabled class="input is-medium replace-placeholder" type="text" value="{{$serial->serial_number}}" name="">
                                    <input type="hidden" value="{{$serial->serial_number}}" name="serial_number">
                                </div>
                            </div>
                        @endif
                        <div class="field">
                            <label class="label is-flex is-relative">
                                Email *
                            </label>
                            <div class="control">
                                <input id="radio-serial" class="input is-medium replace-placeholder" type="email" placeholder="eample@example.com" name="email">
                            </div>
                        </div>
                        @if ($serial->required_fields)
                            @foreach ($serial->required_fields as $field)
                            @php
                                $label = \App\Models\Serials::$requiredFields[$field];
                            @endphp
                            <div class="field">
                                <label class="label is-flex is-relative">
                                {{ $label }} *
                                </label>
                                <div class="control">
                                    <input id="radio-serial" class="input is-medium replace-placeholder" type="text" name="{{ $field }}">
                                </div>
                            </div>
                            @endforeach
                        @endif
                        @if(!request()->input('serial_number'))
                            <div class="field">
                                <label class="label is-flex is-relative">
                                Reference Image *
                                </label>
                                <div class="control">
                                    <input id="radio-serial" name="reference_image" class="input is-medium replace-placeholder" accept="image/png,image/jpeg,image/jpg" required type="file">
                                </div>
                            </div>
                        @endif
                        <div class="field">
                            <button class="button is-primary is-fullwidth is-medium" type="submit"><span>Get Radio Code</span> <i class="mdi mdi-arrow-right-thin-circle-outline"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_content')
@endsection