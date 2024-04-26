@extends('welcome')


@section('content')
<!-- Lost-password-Page -->
<div class="page-lost-password u-s-p-t-80">
    <div class="container">
        <div class="page-lostpassword">
            <h2 class="account-h2 u-s-m-b-20">Forgot Password ?</h2>
            <h6 class="account-h6 u-s-m-b-30">Enter your email or username below and we will send you a link to reset your password.</h6>
            <form method="POST" action="{{ route('password.email') }}">
                <div class="w-50">
                    <div class="u-s-m-b-13">
                        <label for="user-name-email">Your Email
                            <span class="astk">*</span>
                        </label>
                        <input id="user-name-email" type="email" class="text-field @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="u-s-m-b-13">
                        <button type="submit" class="button button-outline-secondary">
                            {{ __('Get Reset Link') }}
                        </button>
                    </div>
                </div>
                <div class="page-anchor">
                    <a href="{{ url('login') }}">
                        <i class="fas fa-long-arrow-alt-left u-s-m-r-9"></i>Back to Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Lost-Password-Page /- -->

@endsection