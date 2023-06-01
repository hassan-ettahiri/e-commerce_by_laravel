@extends('welcome')

@section('content')
    <div class="page-account u-s-p-t-80">
        <div class="container">
            <div class="row">
                <!-- Login -->
                <div class="col-lg-12">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Login</h2>
                        <h6 class="account-h6 u-s-m-b-30">Welcome back! Sign in to your account.</h6>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="user-name-email">Username or Email
                                    <span class="astk">*</span>
                                </label>
                                <input id="user-name-email" type="email" class="text-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Username / Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="login-password">Password
                                    <span class="astk">*</span>
                                </label>
                                <input id="login-password" type="password" class="text-field @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="group-inline u-s-m-b-30">
                                <div class="group-1">
                                    <input class="check-box" type="checkbox" name="remember" id="remember-me-token" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="label-text" for="remember-me-token">Remember me</label>
                                </div>
                                <div class="group-2 text-right">
                                    <div class="page-anchor">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="m-b-45">
                                <button type="submit" class="button button-outline-secondary w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
