@extends('front_end.layout.main')
@section('content')
<!-- Login Page Form Section Start -->
<section class="login_signup_form">
    <div class="container">
        <div class="login-signup-wrapper">
            <div class="form-container">
                @if(Session::has('success'))
                <span class="alert alert-success text-center">{{ Session::get('success') }}</span>
                @endif
                @if(Session::has('error'))
                <span class="alert alert-danger text-center">{{ Session::get('error') }}</span>
                @endif
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf

                    <input type="email" class="form-control para" placeholder="Enter your email" name="email" value="{{ old('email') }}" />
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" placeholder="Choose name" name="first_name" class="form-control para"
                        id="first_name" value="{{ old('first_name') }}" />
                    @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="password"  class="form-control para" placeholder="Create password" id="password-field" name="password" />
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="password"  class="form-control para" placeholder="Confirm password" id="password-field" name="password_confirmation" />
                   
                    <button type="submit" class="btn signup">create account</button>
                    <p>Clicking <strong>create account</strong> means that you are agree to our <a
                            href="javascript:void(0)">terms of services</a>.</p>
                    <hr />
                </form>

            </div>
        </div>
    </div>
</section>
<!-- Login Page Form Section End -->
@endsection
