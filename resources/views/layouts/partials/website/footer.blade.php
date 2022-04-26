<div class="trust-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="item">
                    <h2><img src="{{ asset('img/circle.jpg') }}" alt="Experts on Hand" /> Experts on Hand</h2>
                    <hr>
                    <p>Battery dead, radio not working? Our team of expert radio decoders are here to help. Our
                        specialist have unlocked over 250,000 radios, rest assured your in good hands.</p>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="item">
                    <h2><img src="{{ asset('img/circle.jpg') }}" alt="Trusted Worldwide Service" /> Trusted Worldwide Service
                    </h2>
                    <hr>
                    <p>With over 20,000 reviews, we are the most trustworthy and reliable service in the world. Covering
                        99% of car radios in all countries across the world.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <h2><img src="{{ asset('img/circle.jpg') }}" alt="Lifetime Free Radio Code" /> Lifetime Free Radio Code</h2>
                    <hr>
                    <p>If you ever misplace or lose your stereo code theres no need to worry! Once you purchase from us
                        you can retrieve you radio code at anytime again.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 item help-full-info">
                <h4>Helpful Information</h4>
                <hr>
                <ul>
                    <li><a href="{{ route('manufacturers') }}">Find Your Radio Code</a></li>
                    <li><a href="{{ route('home') }}#aboutUs">About</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('manufacturers') }}">View All Radio Code</a></li>
                </ul>
            </div>
            <div class="col-md-4 item choose-us">
                <h4>Why Choose Us?</h4>
                <hr>
                <ul>
                    <li>Free Radio Code Retrieval</li>
                    <li>Most Decodes appear instantly</li>
                    <li>Uk's No.1 Radio Decode Service</li>
                    <li>Over 100,000 Happy Customers Served</li>
                    <li>100% Money Back Guarantee</li>
                </ul>
            </div>
            <div class="col-md-4 item reviews">
                <h4>Best Reviews</h4>
                <hr>
                <h5><i class="icofont-star"></i> Trustpilot</h5>
                <hr>
                <div>
                    <i class="icofont-star"></i>
                    <i class="icofont-star"></i>
                    <i class="icofont-star"></i>
                    <i class="icofont-star"></i>
                    <i class="icofont-star"></i>
                </div>
                <p>4.7 / 5 | 15,671 reviews </p>
                <h5><i class="icofont-star"></i> Reviews</h5>
                <hr>
            </div>
        </div>
        <div class="row mt-5 bottom-section">
            <img src="{{ asset('img/logo-w.png') }}" alt="{{ config('app.name') }}">
            <p class="mt-3">Copyright &copy; {{ now()->year }}, All rights reserved. {{ config('app.name') }}.</p>
            <nav>
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('manufacturers') }}">Radio Codes</a>
                <a href="{{ route('home') }}#aboutUs">About</a>
                <a href="{{ route('contact') }}">Contact</a>
            </nav>
            <div class="social">
                <a href="#"><i class="icofont-facebook"></i></a>
                <a href="#"><i class="icofont-twitter"></i></a>
                <a href="#"><i class="icofont-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>
