@extends('website.layout.layout')
@section('header_content')
@endsection
@section('content')
    <section class="section is-light is-small is-relative">
        <div class="container has-text-centered">
            <div class="columns">
                <div class="column">
                    <h1 class="title is-2 is-spaced mb-5">Contact Our Expert Online Radio Code Team Today</h1>
                    <p class="subtitle">Our radio expert team is here to help you. You can also complete the contact form below and we will contact you as soon as possible.</p>
                </div>
            </div>
            <div class="columns is-centered">
                <div class="column">
                    <div class="card contact-card">
                    <a href="tel:01942604333" title="Phone Us">
                        <div class="card-content has-text-centered">
                            <img src="{{asset('img/phone.png')}}">
                            <div>
                                <h4 class="title is-4">
                                <small class="open pulse phone--pulse is-changeable-pulse"></small>
                                <span>Phone</span>
                                </h4>
                                <p>Mon - Sat 9:00am until 4:30pm</p>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="column">
                    <div class="card contact-card">
                    <a onclick="if (!window.__cfRLUnblockHandlers) return false; if (!window.__cfRLUnblockHandlers) return false; tidioChatApi.open()" title="Live Chat" data-cf-modified-e4576c51d58b71575f01b077-="">
                        <div class="card-content has-text-centered">
                            <img  src="{{asset('img/live.png')}}">
                            <div>
                                <h4 class="title is-4">
                                <small class="open pulse livechat--pulse is-changeable-pulse"></small>
                                <span>Live Chat</span>
                                </h4>
                                <p>Mon - Sat 9:00am until 4:30pm</p>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="column">
                    <div class="card contact-card">
                    <a href="cdn-cgi/l/email-protection.html#1b737e776b5b74757772757e697a7f727478747f7e68357874356e70" title="Email Us">
                        <div class="card-content has-text-centered">
                            <img  src="{{asset('img/email.png')}}">
                            <div>
                                <h4 class="title is-4">
                                <small class="open pulse email--pulse"></small>
                                <span>Email</span>
                                </h4>
                                <p>24 Hours a Day 7 Days a Week.</p>
                                <small>&nbsp;</small>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section is-light is-small is-relative">
        <div class="container">
            <div class="content has-text-left">
                <h2 class="title is-2">Contact Form</h2>
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
                <div class="columns">
                    <div class="column">
                    <form id="contact-submit" method="post" action="{{route('post-contact')}}">
                        @csrf
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control has-icons-left">
                                <input class="input is-medium" type="text" name="name" placeholder="Your name" required="">
                                <span class="icon is-small is-left">
                                <i class="mdi mdi-account-circle"></i>
                                </span>
                                @error('name')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input is-medium" type="email" name="email" placeholder="example@me.com" required="">
                                <span class="icon is-small is-left">
                                <i class="mdi mdi-email"></i>
                                </span>
                                <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                @error('email')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Subject</label>
                            <div class="control">
                                <div class="select is-medium is-fullwidth">
                                <select required="" name="subject" id="subject">
                                    <option value="Subject" disabled="" selected="">Subject</option>
                                    <option value="General Enquiry">General Enquiry</option>
                                    <option value="My Order">My Order</option>
                                    <option value="Radio Code Help">Radio Code Help</option>
                                    <option value="Supply to Us">Supply to Us</option>
                                    <option value="Other">Other</option>
                                </select>
                                </div>
                                @error('subject')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Message</label>
                            <div class="control">
                                <textarea class="textarea is-medium" name="message" placeholder="Message area" required=""></textarea>
                                @error('message')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-primary is-medium is-fullwidth" id="btn">Submit</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="column">
                    <img src="{{asset('assets/img/map.jpg')}}" alt="OnlineRadioCodes.co.uk Location on Map">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer_content')
@endsection