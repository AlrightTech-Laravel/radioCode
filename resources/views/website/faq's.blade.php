@extends('website.layout.layout')
@section('header_content')
@endsection
@section('content')
<!--<header class="hero has-background is-medium is-dark">-->
<header class="hero has-background is-medium is-white homepage is-primary-gradient section-arrow next-is-light">
    <div class="container has-text-centered is-max-desktop">
       <div class="hero-body has-padding-sides">
          <div class="hero__inner">
             <h1 class="title is-2 is-spaced">FAQ's</h1>
          </div>
       </div>
    </div>
 </header>
 <section class="section is-light is-relative">
    <div class="container">
       <div class="columns is-centered">
          <div class="column">
             <div class="box">
                <div class="content">
                   <h3 class="title is-4 has-text-centered">General Queries</h3>
                   <div class="accordion">
                    @foreach($faqs as $each)
                        @if($each->type == 1)
                        <div class="faq-item accordion-item">
                            <header class="faq-title accordion-title">
                                <span>
                                <div>
                                    <span>{{$each->title}}</span>
                                </div>
                                <div>
                                    <span class="icon"><i class="mdi mdi-plus"></i></span>
                                </div>
                                </span>
                            </header>
                            <div class="faq-content accordion-content">
                                {{$each->description}}
                            </div>
                        </div>
                        @endif
                      @endforeach
                   </div>
                </div>
             </div>
          </div>
          <div class="column">
             <div class="box">
                <div class="content">
                   <h3 class="title is-4 has-text-centered">Payment & Billing Information</h3>
                   <div class="accordion">
                    @foreach($faqs as $each)
                        @if($each->type == 2)
                        <div class="faq-item accordion-item">
                            <header class="faq-title accordion-title">
                                <span>
                                <div>
                                    <span>{{$each->title}}</span>
                                </div>
                                <div>
                                    <span class="icon"><i class="mdi mdi-plus"></i></span>
                                </div>
                                </span>
                            </header>
                            <div class="faq-content accordion-content">
                                {{$each->description}}
                            </div>
                        </div>
                        @endif
                      @endforeach
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="columns is-centered">
          <div class="column">
             <div class="box">
                <div class="content">
                   <h3 class="title is-4 has-text-centered">Landing Page</h3>
                   <div class="accordion">
                    @foreach($faqs as $each)
                        @if($each->type == 3)
                        <div class="faq-item accordion-item">
                            <header class="faq-title accordion-title">
                                <span>
                                <div>
                                    <span>{{$each->title}}</span>
                                </div>
                                <div>
                                    <span class="icon"><i class="mdi mdi-plus"></i></span>
                                </div>
                                </span>
                            </header>
                            <div class="faq-content accordion-content">
                                {{$each->description}}
                            </div>
                        </div>
                        @endif
                      @endforeach
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