<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <a href="{{ route('admin.dashboard') }}" class="c-sidebar-brand d-lg-down-none" style="padding: 0.5rem;">
        <div class="d-flex flex-column justify-content-center align-items-center py-2">
            <img width="100%" src="{{asset('img/logo-w.png')}}" alt="{{config('app.name')}}" style="width: calc(100% - 50px); max-width: 100%;">

            <div class="mt-3">
                <span class="d-inline-block font-semibold text-center" style="font-size: 0.8rem;">
                    {{ ucwords(auth()->user()->getRoleNames()->first()) }} Dashboard
                </span>
            </div>
        </div>
    </a>
    <ul class="c-sidebar-nav ps ps--active-y">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link @if(request()->routeIs('admin.dashboard')) c-active @endif" href="{{route('admin.dashboard')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-speedometer')}}"></use>
                </svg>
                Dashboard
            </a>
        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown border-top @if(request()->routeIs('admin.order.index')) c-show @endif">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-cart')}}"></use>
                </svg>Orders
            </a>
            <!-- <ul class="c-sidebar-nav-dropdown-items"> -->
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.order.index') }}"><span class="c-sidebar-nav-icon"></span>All Orders</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.order.pending') }}"><span class="c-sidebar-nav-icon"></span>Pending Orders</a></li>
            <!-- </ul> -->
        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown border-top @if(request()->routeIs('admin.manufacturer.*')) c-show @endif">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-garage')}}"></use>
                </svg>Manufacturers
            </a>
            <!-- <ul class="c-sidebar-nav-dropdown-items"> -->
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.manufacturer.ManufacturerBrands') }}"><span class="c-sidebar-nav-icon"></span>Manufacturer Brands</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.manufacturer.index') }}"><span class="c-sidebar-nav-icon"></span>All Manufacturer</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.manufacturer.create') }}"><span class="c-sidebar-nav-icon"></span>Create Manufacturer</a></li>
            <!-- </ul> -->
        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown border-top @if(request()->routeIs('admin.instant-code.*')) c-show @endif">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-bullhorn')}}"></use>
                </svg>Radio & Serial Codes
            </a>
            <!-- <ul class="c-sidebar-nav-dropdown-items"> -->
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.instant-code.index') }}"><span class="c-sidebar-nav-icon"></span>List Radio & Serial Codes</a></li>
            {{--<li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.instant-code.create') }}"><span class="c-sidebar-nav-icon"></span>Create Instant Codes</a></li>--}}
            <!-- </ul> -->
        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown border-top @if(request()->routeIs('admin.faq.*')) c-show @endif">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-school')}}"></use>
                </svg>FAQs
            </a>
            <!-- <ul class="c-sidebar-nav-dropdown-items"> -->
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.faq.index') }}"><span class="c-sidebar-nav-icon"></span>All FAQs</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.faq.create') }}"><span class="c-sidebar-nav-icon"></span>Create FAQ</a></li>
            <!-- </ul> -->
        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown border-top @if(request()->routeIs('admin.faq.*')) c-show @endif">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-school')}}"></use>
                </svg>Choose us
            </a>
            <!-- <ul class="c-sidebar-nav-dropdown-items"> -->
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.choose.index') }}"><span class="c-sidebar-nav-icon"></span>All Chooses</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.choose.create') }}"><span class="c-sidebar-nav-icon"></span>Create Choose</a></li>
            <!-- </ul> -->
        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown border-top @if(request()->routeIs('admin.review.*')) c-show @endif">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-speech')}}"></use>
                </svg>Reviews
            </a>
            <!-- <ul class="c-sidebar-nav-dropdown-items"> -->
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.review.index') }}"><span class="c-sidebar-nav-icon"></span>All Reviews</a></li>
            <!-- <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.review.create') }}"><span class="c-sidebar-nav-icon"></span>Create Review</a></li> -->
            <!-- </ul> -->
        </li>

        @can('create users')
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown border-top @if(request()->routeIs('admin.user.*')) c-show @endif">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{asset('svg_sprites/free.svg#cil-user')}}"></use>
                    </svg>Users
                </a>
                <!-- <ul class="c-sidebar-nav-dropdown-items"> -->
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.user.index') }}"><span class="c-sidebar-nav-icon"></span>All Users</a></li>
                <!-- </ul> -->
            </li>
        @endcan

        <form action="{{ route('logout') }}" method="POST" style="display: inline">
            @csrf
            <li class="c-sidebar-nav-item">
                <button type="submit" class="c-sidebar-nav-link" style="border: 0;">
                    <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-account-logout')}}"></use>
                    </svg> Logout
                </button>
            </li>
        </form>
    </ul>
</div>
