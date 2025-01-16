@extends('front_end.layout.main')
@section('title','Update Passsword')
@section('content')
<!-- Home Page Banner Section Start -->
<section class="fanatiqs-leagues-pages  bg-cover bg-no-repeat">
    <div class="container">
        <div class="fanatiqs-banner-content">
            <ul class="leagues-ul">
                <li class="inline-list home-list">
                    <h3>
                        <a href="{{ route('home') }}">Home</a>
                    </h3>
                </li>
                <li class="inline-list next-page-list">
                    <h3>
                        Update Password
                    </h3>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- Home Page Banner Section End-->

<!-- Leagues Content Section Start -->
<section class="my-profile py-10">
    <div class="container">
        <div class="mmy-profile-inner">
        @include('front_end.pages.profile.profile-sidebar')

            <div class="col-sec">
                <div class="user-content-update">
                    <div class="">
                        <div class="tab-content tab-content-1 active">
                            <div class="user-content-box">
                                <form action="{{ route('profile.update.password') }}" method="POST" class="mt-60 ">
                                @csrf

                                    <div class="row">
                                        <div class="mb-3">
                                            <input type="password" placeholder="Current Password"
                                                class="form-control para" id="cur_password" 
                                                autocomplete="off" name="current_password">
                                                @error("current_password")
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" placeholder="New Password" class="form-control para"
                                                id="new_password" name="new_password">
                                                @error("new_password")
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" placeholder="Confirm Password"
                                                class="form-control para" id="conf_password"
                                                name="new_password_confirmation">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Leagues Content Section End -->

<!-- disclamar section start -->
<section class="discalimer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="dis_text">
                    <p>This website is intended for entertainment purposes only. All data and statistics are
                        provided on an "as-is" basis and may not reflect real-time accuracy. Player images, names,
                        and other related content are used under fair use and are the property of their respective
                        owners. Fantasy soccer scoring and league systems are for recreational use, and this site is
                        not affiliated with any official sports organization or governing body. By using this site,
                        you agree to our [Terms of Service] and [Privacy Policy].</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- discalimer section end -->
@endsection
