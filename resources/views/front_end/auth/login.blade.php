@extends('front_end.layout.main')
@section('title','Login')
@section('content')

    <!-- Login Page Form Section Start -->
    <section class="login_signup_form">
        <div class="container">
            <div class="login-signup-wrapper">
                <div class="form-container">
                    <form action="{{ route('login.post') }}" method="POST" id="login-signup">
                    @csrf
                    <h3 class="text-center">Login</h3>
                    @if(Session::has('error'))
                        <span class="alert alert-danger">{{ Session::get('error') }}</span>
                    @endif
                        <fieldset>
                            <input placeholder="Enter Your Email" type="email" tabindex="1" name="email" autofocus>
                            @error('email')
                     <span class="text-danger">{{ $message }}</span>
                    @enderror
                        </fieldset>
                        <fieldset>
                            <input placeholder="Enter Password" type="password" tabindex="2" name="password">
                            @error('password')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </fieldset>
                        <fieldset>
                            <button name="submit" type="submit" id="login-submit" data-submit="...Sending">
                                LOGIN</button>
                        </fieldset>
                        <p class="jump-text">
                            Don't have an account yet? <a href="{{ route('register') }}">Sign Up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Page Form Section End -->
@endsection
