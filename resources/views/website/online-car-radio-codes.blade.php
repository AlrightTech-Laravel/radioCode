@extends('website.layout.layout')
@section('header_content')
@endsection
@section('content')
@include('website.layout.header')
<header class="hero has-background is-medium is-dark has-overlay">
	<img class="hero-background" alt="Find Your Car Radio Code" src="{{ asset('img/bgi-2.jpg') }}">
	<div class="container has-text-centered is-max-desktop">
		<div class="hero-body has-padding-sides">
			<div class="hero__inner">
				<h1 class="title is-2 is-spaced mb-5">Find Your Car Radio Code</h1>
				<p class="subtitle">OnlineRadioCodes.co.uk is the No.1 online & stress free radio decoding service throughout worldwide. please see our catalogue of car and radio manufacturers below. If you are unable to locate your radio unlock code, please don't hesitate to contact us, car radio experts are on hand to help with any query and will give you the best advice possible.</p>
			</div>
		</div>
	</div>
</header>
<section class="section is-light is-small is-relative">
	<div class="container">
		<ul class="all-codes-grid">
			@foreach($brands as $each)
			<li class="alfa">
				<div class="card">
				<a href="{{route('radio-code-order.show', $each)}}" title="{{$each->name}} Radio Codes">
					<span>
						<img src="{{$each->logo_url}}">
						<!-- <svg class="icon is-logo">
							<use xlink:href="#alfa-romeo"></use>
						</svg> -->
					</span>
					<span>{{$each->name}}</span>
				</a>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</section>
@endsection
@section('footer_content')
@endsection