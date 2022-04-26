<header class="fixed-top main-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="img-fluid" src="{{ asset('img/logo-w.png') }}" alt="{{ config('app.name') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item @if(request()->routeIs('home')) active @endif">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#aboutUs">About us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true">
                            Radio Codes
                        </a>
                        <div class="dropdown-menu custom-dropdown" style="min-width: unset" aria-labelledby="navbarDropdown">
                            <div class="dropdown-manufacturers">
                                @foreach ($manufacturers as $item)
                                    <a href="{{ route('radio-code-order.show', $item) }}"><img src="{{ $item->logo_url }}" alt="{{ $item->title }}"></a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
