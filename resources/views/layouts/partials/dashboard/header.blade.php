
        <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-menu')}}"></use>
                </svg>
            </button>
            <a class="c-header-brand d-lg-none" href="{{ route('admin.dashboard') }}">
                <img width="118" src="{{ asset('img/logo-w.png') }}" alt="{{ config('app.name') }}">
            </a>
            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-menu')}}"></use>
                </svg>
            </button>
            <ul class="c-header-nav d-md-down-none">
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                {{-- <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li> --}}
            </ul>
            <ul class="c-header-nav ml-auto mr-4">
                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="c-avatar"><img class="c-avatar-img" src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->initials }}"></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pt-0">
                        <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
                        {{-- <a class="dropdown-item" href="#">
                            <svg class="c-icon mr-2">
                                <use xlink:href="{{asset('svg_sprites/free.svg#cil-user')}}"></use>
                            </svg> Profile
                        </a> --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                <svg class="c-icon mr-2">
                                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-account-logout')}}"></use>
                                </svg> Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
            @if($breadcrumb)
            <div class="c-subheader px-3">
                <ol class="breadcrumb border-0 m-0">
                    {{ $breadcrumb ?? '' }}
                </ol>
            </div>
            @endif
        </header>
