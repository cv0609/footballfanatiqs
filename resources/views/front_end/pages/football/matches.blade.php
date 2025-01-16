@extends('front_end.layout.main')
@section('title','Matches')
@section('content')
<!--Leagues Pages Banner Section Start -->
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
                        Matches
                    </h3>
                </li>
            </ul>
        </div>
    </div>
</section>
<!--Leagues Pages Banner Section End -->


<!-- Leagues Content Section Start -->
<section class="fanatiqs_leagues vd_naive matches py-5">
    <video autoplay muted loop class="background-video">
        <source src="{{ asset('assets/images/0_Soccer_Football_3840x2160.mp4') }}" type="video/mp4">
    </video>
    <div class="container">
        <div class="basket_leagues-inner">
            <div class="back-btn">
                <a href="{{ route('leagues') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#fff">
                        <path d="M360-240 120-480l240-240 56 56-144 144h568v80H272l144 144-56 56Z"></path>
                    </svg>
                </a>
            </div>
            <h2 class="text-center pb-5 leagues-h2">{{ (date('Y') - 1).'-'.date('Y') }} Season</h2>

            <div class="basket_leagues-inner-content">
                <div class="matches-list">
                    <ul class="match-team-header national-header">
                        <li class="match-item header-color">
                            <div class="match-team match-width">
                                <div class="match-team-inner">
                                    <h6>Team</h6>
                                </div>
                            </div>
                            <div class="match-info match-width">
                                <h6>Matches Info</h6>
                            </div>
                            <div class="match-team match-width">
                                <div class="match-team-inner">
                                    <h6>Team</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="table-color national-table">
                       @foreach ($matches as $key => $matche)
                            @php
                            $startSoonMatch = getMatchStatus($matche->fixture_date);
                            @endphp
                        <li class="match-item matche-main" data-fixture-id="{{ $matche->id}}"
                                data-league-id="{{$matches[0]->league->league_id}}"
                                data-home-team="{{ $matche->home_team_id }}"
                                data-away-team="{{ $matche->away_team_id }}">
                            <a href="matches-details">
                                <div class="match-team match-width">
                                    <div class="match-team-inner">
                                        <img src="{{ $matche->home_team_logo }}" class="lazy-load" alt="team-logo">
                                        <h6>{{ $matche->home_team_name }}</h6>
                                    </div>

                                </div>
                                <div class="match-info match-width mid">
                                    <h6>{{$matche->venue_name}}</h6>
                                    <p>{{$matche->venue_city}}</p>
                                    <span>{{ date('Y-m-d h:i a',strtotime($matche->fixture_date))}}</span>
                                </div>
                                <div class="match-team match-width">
                                    <div class="match-team-inner">
                                        <img src="{{ $matche->away_team_logo }}" class="lazy-load" alt="team-logo">
                                        <h6>{{ $matche->away_team_name }}</h6>
                                    </div>

                                </div>
                            </a>
                        </li>
                     @endforeach

                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Leagues Content Section End -->
@endsection
@section('custom-script')
<script>
    $(".matche-main").on('click', function () {
        //  var homeTeam = $(this).data('home-team'); // Assuming teams is an array
        //  var awayTeam = $(this).data('away-team'); // Assuming teams is an array
        //  var leagueId = $(this).data('league-id'); // Assuming teams is an array
        var matcheId = $(this).data('fixture-id'); // Assuming teams is an array

        var url = "{{ route('matche-detail', [':matcheId']) }}";
        url = url.replace(':matcheId', matcheId);

        window.location.href = url;
    });

    //  $(".matche-main-not-start").on('click',function(){
    //     $("#error-message").html("Lineups are available between 20 and 40 minutes before the match start");
    //     $("#errorModal2").modal('show');
    //  })

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    let table = new DataTable('#myTable');

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        lazyLoading();
    });

    $(document).ready(function () {

        $(document).on('click', '.dt-paging-button', function () {
            lazyLoading();
        });

        $('.dt-input').on('keyup change', function () {
            lazyLoading();
        });

    });

    function lazyLoading() {

        let lazyImages = [].slice.call(document.querySelectorAll("img.lazy-load"));

        if ("IntersectionObserver" in window) {
            let lazyImageObserver = new IntersectionObserver(function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        let lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        lazyImage.classList.remove("lazy-load");
                        lazyImageObserver.unobserve(lazyImage);
                    }
                });
            });

            lazyImages.forEach(function (lazyImage) {
                lazyImageObserver.observe(lazyImage);
            });
        } else {
            // Fallback for older browsers
            lazyImages.forEach(function (lazyImage) {
                lazyImage.src = lazyImage.dataset.src;
            });
        }
    }

</script>

@endsection
