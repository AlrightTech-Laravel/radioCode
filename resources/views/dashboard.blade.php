<x-dashboard-layout>
    <x-slot name="pageTitle">Dashboard</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </x-slot>

    <div>
        <div class="row">
            <div class="col-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="bg-info p-3 mfe-3">
                            <svg class="c-icon c-icon-xl">
                                <use xlink:href="{{asset('svg_sprites/free.svg#cil-garage')}}"></use>
                            </svg>
                        </div>
                        <div>
                            <div class="text-value text-info">{{ $counts['manufacturers'] }}</div>
                            <div class="text-muted text-uppercase font-weight-bold small">Manufacturers</div>
                        </div>
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#"><span class="small font-weight-bold">View More</span>
                            <svg class="c-icon">
                            <use xlink:href="{{asset('svg_sprites/free.svg#cil-chevron-right')}}"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="bg-primary p-3 mfe-3">
                            <svg class="c-icon c-icon-xl">
                                <use xlink:href="{{asset('svg_sprites/free.svg#cil-cart')}}"></use>
                            </svg>
                        </div>
                        <div>
                            <div class="text-value text-primary">0</div>
                            <div class="text-muted text-uppercase font-weight-bold small">Orders</div>
                        </div>
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#"><span class="small font-weight-bold">View More</span>
                            <svg class="c-icon">
                            <use xlink:href="{{asset('svg_sprites/free.svg#cil-chevron-right')}}"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="bg-warning p-3 mfe-3">
                            <svg class="c-icon c-icon-xl">
                                <use xlink:href="{{asset('svg_sprites/free.svg#cil-money')}}"></use>
                            </svg>
                        </div>
                        <div>
                            <div class="text-value text-warning">$0</div>
                            <div class="text-muted text-uppercase font-weight-bold small">Payments</div>
                        </div>
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#"><span class="small font-weight-bold">View More</span>
                            <svg class="c-icon">
                            <use xlink:href="{{asset('svg_sprites/free.svg#cil-chevron-right')}}"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 d-flex align-items-center">
                        <div class="bg-danger p-3 mfe-3">
                            <svg class="c-icon c-icon-xl">
                                <use xlink:href="{{asset('svg_sprites/free.svg#cil-gem')}}"></use>
                            </svg>
                        </div>
                        <div>
                            <div class="text-value text-danger">{{ $counts['instant_codes'] }}</div>
                            <div class="text-muted text-uppercase font-weight-bold small">Instant Codes</div>
                        </div>
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#"><span class="small font-weight-bold">View More</span>
                            <svg class="c-icon">
                                <use xlink:href="{{asset('svg_sprites/free.svg#cil-chevron-right')}}"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Orders</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="c-callout c-callout-info">
                                    <small class="text-muted">Supplements</small>
                                    <div class="text-value-lg">{{ $orders['supplements'] }}</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="c-callout c-callout-danger">
                                    <small class="text-muted">Dried Blood</small>
                                    <div class="text-value-lg">{{ $orders['dried-blood'] }}</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="c-callout c-callout-warning">
                                    <small class="text-muted">Metabolic</small>
                                    <div class="text-value-lg">{{ $orders['metabolic'] }}</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="c-callout c-callout-success">
                                    <small class="text-muted">Biohacking</small>
                                    <div class="text-value-lg">{{ $orders['biohacking'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        @can('view all users')
        <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive-sm table-hover table-outline mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">
                                <svg class="c-icon">
                                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-people')}}"></use>
                                </svg>
                            </th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Activity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">
                                    <div class="c-avatar">
                                        <img class="c-avatar-img" src="{{ $user->avatar_url }}" alt="{{ $user->email }}">
                                    </div>
                                </td>
                                <td>
                                    <div>{{ ucwords($user->name) }}</div>
                                    <div class="small text-muted">Registered: {{ $user->created_at->format('M d, Y') }}</div>
                                </td>
                                <td>
                                    {{ strtolower($user->email) }}
                                </td>
                                <td>
                                    {{ $user->phone ?? "NA" }}
                                </td>
                                <td>
                                    <div class="small text-muted">Last login</div>
                                    <strong>
                                        @if ($user->last_login_time)
                                            {{ $user->last_login_time->diffForHumans(now()) }}
                                        @else
                                            NA
                                        @endif
                                    </strong>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endcan
    </div>
</x-dashboard-layout>
