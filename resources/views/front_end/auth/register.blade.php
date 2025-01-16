@extends('front_end.layout.main')
@section('content')
<!-- Register Page Form Section Start -->
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
                <form action="{{ route('register.post') }}" method="POST" id="login-signup">
                    @csrf
                    <h3 class="text-center">Register</h3>
                    <fieldset>
                    <input type="email"  placeholder="Enter Your Email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </fieldset>
                    <fieldset>
                    <input type="text" placeholder="Choose Name" name="first_name" 
                        id="first_name" value="{{ old('first_name') }}">
                    @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </fieldset>
                    <fieldset>
                    <input type="text" placeholder="Enter Phone Number (Optional)" name="phone" 
                        id="phone" value="{{ old('phone') }}">     
                    @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </fieldset>
                    <fieldset>
                    <input type="password"   placeholder="Enter Password" id="password-field" name="password">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </fieldset>
                    <fieldset>
                    <input type="password"  placeholder="Re-Enter Password" id="password-field" name="password_confirmation">
                    </fieldset>
                    <fieldset>
                    <button type="submit" class="signup" type="button">Create Account</button>
                    </fieldset> 
                    <p class="jump-text">
                            Already have an account? <a href="{{ route('login') }}">Login</a>
                        </p>                                   
                </form>

            </div>
        </div>
    </div>
</section>
<!-- Register Page Form Section End -->
@endsection
