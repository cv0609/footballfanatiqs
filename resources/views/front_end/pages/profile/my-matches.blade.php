@extends('front_end.layout.main')
@section('content')
@php
$PointCalculationService = app(App\Services\PointCalculationService::class);
@endphp
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
                        My Matches
                    </h3>
                </li>
            </ul>
        </div>
    </div>
</section>
<!--Leagues Pages Banner Section End -->



<!-- Leagues Content Section Start -->
<div class="fanatiqs_leagues vd_naive my-matches odd_naive  py-5">
    <video autoplay muted loop class="background-video">
        <source src="{{ asset('assets/images/0_Soccer_Football_3840x2160.mp4') }}" type="video/mp4">
    </video>
    <div class="container">
        <div class="fanatiqs_leagues-inner">
            <h2 class="text-center">Mes matchs</h2>
            <div class="fanatiqs_leagues my-matches-inner-content brooklyn-main">
                <div class="matches-list">
                    <ul class="match-team-header brooklyn-header">
                        <li class="my-match-item header-color">
                            <div class="my-match-team-logo match-width">
                                <h6>Team</h6>
                            </div>
                            <div class="my-match-info match-width">
                                <h6>Match Info</h6>
                            </div>
                            <div class="my-match-team-logo match-width">
                                <h6>Team</h6>
                            </div>
                            <div class="my-match-score match-width">
                                <h6>Score</h6>
                            </div>
                            <div class="my-match-status match-width">
                                <h6>Status</h6>
                            </div>
                        </li>
                    </ul>
                    <ul class="my-matches table-color">
                    @foreach ($matches as $match)
                                @php
                                    $points = $PointCalculationService->calculatePoints(Auth::user()->id,$match->fixture_id);
                                @endphp
                        <li class="my-match-item matche-main" data-fixture-id="{{ $match->fixture_id ?? ''}}" data-league-id="{{ $match->league->league_id ?? ''}}">
                            <div class="my-match-team-logo match-width">
                                <img src="{{ $match->home_team_logo ?? '' }}" alt="{{ $match->home_team_name ?? '' }} logo">
                                <h6>{{ $match->home_team_name ?? '' }}</h6>
                            </div>
                            <div class="my-match-info match-width">
                                <h6>{{ $match->venue_name ?? '' }}</h6>
                                <p>{{$match->venue_city ?? ''}}</p>
                                <span>{{ date('Y-m-d h:i a', strtotime($match->fixture_date ?? '')) }}</span>
                            </div>
                            <div class="my-match-team-logo match-width">
                                <img src="{{ $match->away_team_logo ?? '' }}" alt="{{ $match->away_team_name ?? '' }} logo">
                                <h6>{{ $match->away_team_name ?? '' }}</h6>
                            </div>
                            <div class="my-match-score match-width">
                                <h4>{{$points ?? 0}}</h4>
                            </div>
                            <div class="my-match-status match-width">
                                <p class="win">-- </p>
                            </div>
                        </li>
                        @endforeach   

                    </ul>

                </div>

            </div>

        </div>
    </div>
</div>
<!-- Leagues Content Section End -->
@endsection


@section('custom-script')

<script>
    $(".matche-main").on('click', function () {
        var fixtureId = $(this).data('fixture-id');
        var leagueId = $(this).data('league-id');
        var url = "{{ route('profile.match-detail', [':leagueId', ':fixtureId']) }}";
        url = url.replace(':fixtureId', fixtureId).replace(':leagueId', leagueId);
        window.location.href = url;
    });

</script>

@endsection
