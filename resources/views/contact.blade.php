<x-website-layout>
    <x-slot name="pageTitle">Contact Us | {{ config('app.name') }}</x-slot>
    <div class="no-hero">
        <div class="container">
            <form class="code-available" action="{{ route('post-contact') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header d-flex justify-content-center align-items-center">
                        <h2>Send Us a Message</h2>
                    </div>
                    <div class="card-body">
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
                        <div class="form-group">
                            <label for="name">Enter Your Name:</label>
                            <input type="name" name="name" id="name" class="form-control" placeholder="John Doe" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Enter Your Email Addres:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="john@gmail.com" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subject">Enter Subject:</label>
                            <input type="subject" name="subject" id="subject" class="form-control" placeholder="Enter your contact purpose" value="{{ old('subject') }}" required>
                            @error('subject')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message">Your Message:</label>
                            <textarea name="message" id="message" class="form-control" rows="10" placeholder="Describe the problem you're facing">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-danger text-xsmall">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary px-3">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-website-layout>
