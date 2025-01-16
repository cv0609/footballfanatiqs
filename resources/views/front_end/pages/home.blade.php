@extends('front_end.layout.main')
@section('content')
<!-- Home Page Banner Section Start -->
<div class="football_banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_box">
                    <h1>Play Football Fanatiqs Today!</h1>
                    <p>Join The Action</p>
                    <a href="leagues" class="butn home_leagues_btn">Play Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Home Page Banner Section End-->
<!-- Game Modes section start -->
<section class="game_mode">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="game_inner">
                    <div class="img_box" style="background-image: url(assets/images/classic.png);"></div>
                    <h2>
                        Classic Mode
                    </h2>
                    <p>Build a team with a budget and compete for points all season.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="game_inner">
                    <div class="img_box" style="background-image: url(assets/images/draft.png);"></div>
                    <h2>
                        Draft Mode
                    </h2>
                    <p>Take turns drafting unique players; trade and manage waivers.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="game_inner">
                    <div class="img_box" style="background-image: url(assets/images/fantasy.png);"></div>
                    <h2>
                        Daily Fantasy
                    </h2>
                    <p>Pick teams for single matchdays with results resetting weekly.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="game_inner">
                    <div class="img_box" style="background-image: url(assets/images/head.png);"></div>
                    <h2>
                        Head-to-Head
                    </h2>
                    <p>Face a different opponent each week, with playoffs for top teams.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="game_inner">
                    <div class="img_box" style="background-image: url(assets/images/player.png);"></div>
                    <h2>
                        Salary Cap
                    </h2>
                    <p>Build teams under a dynamic budget; balance stars and value picks.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="game_inner">
                    <div class="img_box" style="background-image: url(assets/images/saviour.png);"></div>
                    <h2>
                        Survivor Mode
                    </h2>
                    <p>Lowest scorer each week is eliminated until one winner remains.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Game Modes section end -->
<!-- form modal Section start -->
<section class="form_modal">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="img_pic" style="background-image: url(assets/images/play.png);">

                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="form-set">

                    <div class="form-toggle">
                        <button id="login-toggle" onclick="toggleLogin()">log in</button>
                        <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
                    </div>

                    <div id="login-form">
                        <form>
                            <input type="text" placeholder="Enter Email or Username">
                            <input type="password" placeholder="Enter Password">
                            <button type="button" class="btn login">login</button>                            
                                                   </form>
                    </div>

                    <div id="signup-form">
                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            <input type="email" placeholder="Enter Your email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" placeholder="Enter Name" name="first_name" 
                            id="first_name" value="{{ old('first_name') }}">
                            @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" placeholder="Enter Phone Number (Optional)" name="phone" 
                            id="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="password" placeholder="Enter Password" name="password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="password" placeholder="Re-Enter Password" id="password-field" name="password_confirmation">
                            <button type="submit" class="btn signup">create account</button>                        
                            <hr />
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- form modal Section end -->
<!-- slider section start -->
<section class="intro">
    <div class="container">
        <div class="left">
            <h2>What Our Users Have To Say</h2>
        </div>

        <div class="slider">
            <button class="arrow-prev"><i class="fa-solid fa-arrow-left"></i></button> <!-- Left Arrow -->
            <ul>
                <li style="background-image:url(assets/images/slider1.jpg)">
                    <div class="slide_up">
                        <h3>John M., Seattle, USA</h3>
                        <p>"Football Fanatiqs is a game-changer for fantasy soccer fans. The draft mode is
                            smooth,
                            and I
                            love how the player stats update in near real-time. The design is clean, and the
                            platform is
                            intuitive, even for newcomers. Highly recommend it to anyone who loves the
                            sport!"
                        </p>
                    </div>
                </li>
                <li style="background-image:url(assets/images/slider1.jpg)">
                    <div class="slide_up">
                        <h3>Liam R., Manchester, UK</h3>
                        <p>"This platform has a lot going for it, especially the head-to-head leagues, which
                            keep
                            things
                            competitive week after week. One thing I’d love to see is more in-depth player
                            analytics—sometimes I feel like I’m guessing between similar players. Other than
                            that,
                            brilliant experience!"</p>
                    </div>
                </li>
                <li style="background-image:url(assets/images/slider1.jpg)">
                    <div class="slide_up">
                        <h3>Raj S., Toronto, Canada</h3>
                        <p>"Football Fanatiqs offers an exciting mix of game modes. I’m especially hooked on
                            the
                            Salary
                            Cap Challenge—it really pushes you to think strategically. A small suggestion:
                            it
                            would
                            be
                            great to have a mobile app for easier team management on the go. Overall,
                            fantastic
                            work!"
                        </p>
                    </div>
                </li>
                <li style="background-image:url(assets/images/slider1.jpg)">
                    <div class="slide_up">
                        <h3>Ethan W., Auckland, New Zealand</h3>
                        <p>"Absolutely loving Football Fanatiqs! The Survivor Mode is unlike anything I’ve
                            played
                            before—it adds real tension each week. The customer support team is also
                            top-notch;
                            they
                            helped me resolve an issue with my account quickly. Highly recommended!"
                        </p>
                    </div>
                </li>
                <li style="background-image:url(assets/images/slider1.jpg)">
                    <div class="slide_up">
                        <h3>Mark L., Chicago, USA</h3>
                        <p>"As a fantasy soccer veteran, I’ve tried most platforms, but Football Fanatiqs
                            stands
                            out.
                            The interface is slick, and the draft process is seamless. I also appreciate the
                            variety
                            of
                            modes—it’s hard to get bored. Keep up the great work!"
                        </p>
                    </div>
                </li>
                <!-- Additional slides here -->
            </ul>
            <button class="arrow-next"><i class="fa-solid fa-arrow-right"></i></button> <!-- Right Arrow -->
        </div>
    </div>
</section>

<!-- slider section end -->
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
