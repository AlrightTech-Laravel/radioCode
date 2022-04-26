<x-guest-layout>
    <x-slot name="pageTitle">Login</x-slot>
    <div class="card-group">
        <div class="card p-4">
            <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">
                                <svg class="c-icon">
                                    <use xlink:href="{{asset('svg_sprites/free.svg#cil-user')}}"></use>
                                </svg></span></div>
                        <input class="form-control @error('email') is-invalid @endif" type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend"><span class="input-group-text">
                                <svg class="c-icon">
                                    <use xlink:href="{{ asset('svg_sprites/free.svg#cil-lock-locked') }}"></use>
                                </svg></span></div>
                        <input class="form-control" type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary px-4" type="submit">Login</button>
                        </div>
                        <div class="col-6 text-right">
                            {{-- <button class="btn btn-link px-0" type="button">Forgot password?</button> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center d-flex flex-column justify-content-center">
                {{-- <div class="mb-4">
                    <h2>Welcome Back</h2>
                </div> --}}
                <img src="{{ asset('img/logo-w.png') }}" alt="{{ config('app.name') }}" style="width: 100%;">
            </div>
        </div>
    </div>
</x-guest-layout>
