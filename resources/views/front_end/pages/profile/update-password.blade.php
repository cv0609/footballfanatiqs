@extends('front_end.layout.main')
@section('content')
<!-- Leagues Content Section Start -->
<section class="my-profile my-matches-page">
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
                                        <div class="mb-3 col-sm-6">
                                            <div class="show_password">
                                                <input type="password" placeholder="Heslo" class="form-control para"
                                                    id="password-field" required="required" autocomplete="off" name="current_password">
                                                    @error("current_password")
                                                     <span class="text-danger">{{ $message }}</span>
                                                 @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <div class="show_password">
                                                <input type="password" placeholder="Heslo" class="form-control para"
                                                    id="password-field" required="required" autocomplete="off" name="new_password">
                                                    @error("new_password")
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 col-sm-6">
                                            <input type="password" placeholder="Potvrďte heslo"
                                                class="form-control para" name="new_password_confirmation" id="con_password" required="required">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Aktualizovat</button>

                                    <!-- <div class="reset-password">
                                        <a href="#">Obnovit heslo</a>
                                    </div> -->

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
@endsection
