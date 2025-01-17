@extends('front_end.layout.main')
@section('title','Playing Guide')
@section('content')
<!--Playing Guide  Banner Section Start -->
<div class="football_banner how_to_play">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_box">
                    <h1>Playing Guide</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Playing Guide Banner Section End -->

<!-- Playing Guide intro Section Start -->
<div class="playing-guide_intro py-5">
    <div class="container">
        <p class="text-center">
        Football Fanatiqs is your gateway to managing your dream soccer team while competing
        with friends and fans around the world. Whether you’re a seasoned fantasy player or a
        beginner, this guide will walk you through everything you need to know.
        </p>
    </div>
</div>
<!-- Playing Guide intro Section End -->

<!-- Playing Guide Content Section Start -->

<section class="sect_faq">
    <div class="container">
        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-title" onclick="toggleFaq(this)">
                    <span>Step 1: Getting Started</span>
                    <span class="faq-icon">&#9660;</span>
                </div>

                <div class="faq-content">
                    <div class="content_faq">
                        <p><strong>Create Your Account:</strong> Visit the Football Fanatiqs website and sign up
                            using
                            your email or social media accounts. Complete your profile to personalize your
                            experience.
                        </p>
                        <p><strong>Choose a League Type:</strong></p>
                        <ul>
                            <li><strong>Join a Public League:</strong> Compete against random players worldwide.
                            </li>
                            <li><strong>Create a Private League:</strong> Set up a league for friends or colleagues
                                and
                                invite them to join.</li>
                        </ul>
                    </div>

                </div>


                <div class="faq-content">
                    <p><strong>Create Your Account:</strong> Visit the Football Fanatiqs website and sign up using
                        your email or social media accounts. Complete your profile to personalize your experience.
                    </p>
                    <p><strong>Choose a League Type:</strong></p>
                    <ul>
                        <li><strong>Join a Public League:</strong> Compete against random players worldwide.</li>
                        <li><strong>Create a Private League:</strong> Set up a league for friends or colleagues and
                            invite them to join.</li>
                    </ul>
                </div>
                <div class="faq_img"></div>
            </div>

            <div class="faq-item">
                <div class="faq-title" onclick="toggleFaq(this)">
                    <span>Step 2: Game Modes Overview</span>
                    <span class="faq-icon">&#9660;</span>
                </div>
                <div class="faq-content">
                    <p>Football Fanatiqs offers multiple game modes to keep the experience fresh and exciting.
                        Choose the one that suits your playstyle:</p>
                    <ul>
                        <li><strong>Classic Mode (Season-Long):</strong> Build a squad within a set budget and earn
                            points based on player performances over the course of the season.</li>
                        <li><strong>Draft Mode:</strong> Participate in a live draft where managers take turns
                            selecting players.</li>
                        <li><strong>Daily Fantasy Soccer:</strong> Choose a team for a single day or matchweek.</li>
                        <li><strong>Head-to-Head Leagues:</strong> Compete against another manager each week.</li>
                        <li><strong>Salary Cap Challenge:</strong> Build your team under a strict salary cap.</li>
                        <li><strong>Survivor Mode (Knockout):</strong> Avoid being the lowest scorer in your league
                            each week to stay in the game.</li>
                    </ul>

                </div>
            </div>

            <div class="faq-item">
                <div class="faq-title" onclick="toggleFaq(this)">
                    <span>Step 3: Building Your Team</span>
                    <span class="faq-icon">&#9660;</span>
                </div>
                <div class="faq-content">
                    <p>Based on your chosen mode, either participate in a live draft or select players from a pool
                        within your budget. Assemble a team with a goalkeeper, defenders, midfielders, and forwards.
                        Ensure you meet any minimum or maximum player requirements for each position.</p>
                    <p><strong>Assign a Captain:</strong> Designate a captain to earn double points for their
                        performance.</p>
                    <p><strong>Bench Players:</strong> Plan your bench strategically to cover for injuries or poor
                        performances.</p>

                </div>
            </div>

            <div class="faq-item">
                <div class="faq-title" onclick="toggleFaq(this)">
                    <span>Step 4: Understanding Scoring</span>
                    <span class="faq-icon">&#9660;</span>
                </div>
                <div class="faq-content">
                    <p>Player points are based on real-world performances in matches. Here’s a breakdown of typical
                        scoring rules:</p>
                    <ul>
                        <li><strong>Positive Actions:</strong></li>
                        <ul>
                            <li>Goals: High points for forwards, midfielders, and defenders.</li>
                            <li>Assists: Points for players contributing to a goal.</li>
                            <li>Clean Sheets: Bonus points for defenders and goalkeepers.</li>
                            <li>Saves: Goalkeepers earn points for making crucial saves.</li>
                        </ul>
                        <li><strong>Negative Actions:</strong></li>
                        <ul>
                            <li>Yellow/Red Cards: Penalty points for disciplinary actions.</li>
                            <li>Own Goals: Deduction for scoring against their own team.</li>
                            <li>Missed Penalties: Negative points for penalty misses.</li>
                        </ul>
                    </ul>
                    <p>Scoring rules may vary by mode, so always review the settings in your league.</p>

                </div>
            </div>

            <div class="faq-item">
                <div class="faq-title" onclick="toggleFaq(this)">
                    <span>Step 5: Transfers and Trades</span>
                    <span class="faq-icon">&#9660;</span>
                </div>
                <div class="faq-content">
                    <p><strong>Weekly Transfers:</strong> Adjust your team by transferring players in and out. Be
                        mindful of transfer limits or penalties for exceeding them.</p>
                    <p><strong>Injury Updates:</strong> Monitor player injuries or suspensions to avoid losing
                        points.</p>
                    <p><strong>Draft Mode Trades:</strong> In Draft Mode, trade players with other managers or pick
                        up free agents from the waiver pool.</p>

                </div>
            </div>

            <div class="faq-item">
                <div class="faq-title" onclick="toggleFaq(this)">
                    <span>Step 6: Strategy Tips</span>
                    <span class="faq-icon">&#9660;</span>
                </div>
                <div class="faq-content">
                    <p><strong>Stay Informed:</strong> Keep up with player performances, injuries, and team
                        schedules. Use analytics or resources to identify undervalued players or hidden gems.</p>
                    <p><strong>Monitor Form and Fixtures:</strong> Favor players with favorable matchups in upcoming
                        games. Avoid players facing tough opponents unless they’re superstars.</p>
                    <p><strong>Adapt Your Strategy:</strong> In Salary Cap Mode, watch for value changes and adjust
                        accordingly. In Survivor Mode, focus on consistency rather than high-risk, high-reward
                        strategies.</p>
                    <p><strong>Engage with the Community:</strong> Join forums or social groups to share insights
                        and tips. Friendly rivalries add to the fun and keep you motivated.</p>

                </div>
            </div>

            <div class="faq-item">
                <div class="faq-title" onclick="toggleFaq(this)">
                    <span>Step 7: Winning the Game</span>
                    <span class="faq-icon">&#9660;</span>
                </div>
                <div class="faq-content">
                    <p><strong>Classic and Daily Fantasy:</strong> Aim to score the most points by the season or
                        matchday’s end.</p>
                    <p><strong>Draft and Head-to-Head:</strong> Top the league standings or win the playoffs.</p>
                    <p><strong>Salary Cap Challenge:</strong> Manage your team effectively within the budget to
                        outscore competitors.</p>
                    <p><strong>Survivor Mode:</strong> Stay consistent and avoid elimination to be the last manager
                        standing.</p>
                    <p><strong>Final Tips:</strong> Set reminders for deadlines to avoid missing transfers or lineup
                        changes. Experiment with different game modes to find what you enjoy most. Remember, it’s
                        not just about winning—it’s about having fun and sharing the experience with others.</p>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- disclamar section start -->
<section class="discalimer">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="dis_text">
                    <h3 class="text-center">
                        Disclaimer
                    </h3>
                    <p>This website is intended for entertainment purposes only. All data and statistics are
                        provided on an "as-is" basis and may not reflect real-time accuracy. Player images, names,
                        and other related content are used under fair use and are the property of their respective
                        owners. Fantasy soccer scoring and league systems are for recreational use, and this site is
                        not affiliated with any official sports organization or governing body. By using this site,
                        you agree to our <strong>Terms of Service</strong> and <strong>Privacy Policy.</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- discalimer section end -->

@endsection
