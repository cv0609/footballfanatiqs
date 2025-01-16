@extends('front_end.layout.main')
@section('content')
@php
$PointCalculationService = app(App\Services\PointCalculationService::class);
use Carbon\Carbon;
@endphp
<!--Leagues Pages Banner Section Start -->
<section class="fanatiqs-leagues-pages bg-cover bg-no-repeat">

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
                        Matches Details
                    </h3>
                </li>
            </ul>
        </div>
    </div>
</section>
<!--Leagues Pages Banner Section End -->


<!-- Leagues Content Section Start -->
<div class="fanatiqs_leagues vd_naive leagues-pages matches-details py-5">
    <video autoplay muted loop class="background-video">
        <source src="{{ asset('assets/images/0_Soccer_Football_3840x2160.mp4') }}" type="video/mp4">
    </video>
    <div class="container">
        <div class="fanatiqs_leagues-inner">
            <div class="back-btn">
                <a href="matches">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#fff">
                        <path d="M360-240 120-480l240-240 56 56-144 144h568v80H272l144 144-56 56Z"></path>
                    </svg>
                </a>
            </div>
            <h2 class="text-center">Saison {{ (date('Y') - 1).'-'.date('Y') }}</h2>
            <div class="leagues-list">
                <div class="plyr-hedr">
                    <div class="team-logo">
                        <div class="team_inner">
                            <img src="{{ $matchDetails[0]->home_team_logo ?? '' }}" alt="team-logo-4">
                        </div>
                        <h6>{{ $matchDetails[0]->home_team_name ?? '' }}</h6>
                    </div>
                    <div class="match-details cen_mid">
                        <h6>{{ $matchDetails[0]->venue_name ?? '' }}</h6>
                        <p>{{ $matchDetails[0]->venue_city ?? ''}}</p>
                        <span>{{ date('Y-m-d h:i a', strtotime($matchDetails[0]->fixture_date ?? '')) }}</span>
                    </div>
                    <div class="team-logo">
                        <div class="team_inner team_inner-right">
                            <img src="{{ $matchDetails[0]->away_team_logo ?? '' }}" alt="team-logo-4">
                        </div>
                        <h6>{{ $matchDetails[0]->away_team_name ?? '' }}</h6>
                    </div>
                </div>

                <div class="tab-content-wrapper">
                    <div class="toggle-target">
                        <a href="#" class="tab active" data-toggle-target=".tab-content-1">Goalkeepers</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-2">Defenders</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-3">Midfielders</a>
                        <a href="#" class="tab" data-toggle-target=".tab-content-4">Forward</a>
                    </div>

                    <div class="tab-content tab-content-1 active">
                        <div class="fanatiqs_leagues-inner-content fanatiqs-header-main">
                            <div class="matches-list">
                                <ul class="match-team-header fanatiqs-header">
                                    <li class="match-item header-color">
                                        <div class="match-team match-width">
                                            <div class="match-team-inner">
                                                <h6>Selected By</h6>
                                            </div>
                                        </div>
                                        <div class="match-info match-width">
                                            <h6>Team</h6>
                                        </div>
                                        <div class="match-team match-width">
                                            <div class="match-team-inner">
                                                <h6>Age</h6>
                                            </div>
                                        </div>
                                        <div class="match-team match-width">
                                            <div class="match-team-inner">
                                                <h6>Injured</h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="table-color fanatiqs-table">
                                @foreach ($organizedPlayers['Goalkeeper'] as $gk_player)

                                    <li class="match-item" data-team-id="{{$gk_player->player_team_id}}"
                                        data-player-id="{{$gk_player->player_id}}" data-player-role="G"
                                        data-player-name="{{$gk_player->name}}"
                                        data-team-logo="{{$gk_player->team_logo}}"
                                        data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing"
                                        data-home-team="{{ $matchDetails[0]->home_team_id }}"
                                        data-away-team="{{ $matchDetails[0]->away_team_id }}"
                                        data-slug-matchid="{{ $matchDetails[0]->id }}">
                                        <div class="match-team match-width">
                                            <h6> {{ $gk_player->name }}</h6>
                                        </div>
                                        <div class="match-info match-width">
                                            <img src="{{$gk_player->team_logo}}" alt="logo">
                                        </div>
                                        <div class="match-team match-width">
                                            <h6>{{$gk_player->age}}</h6>
                                        </div>
                                        <div class="match-team match-width">
                                            <h6>{{ ($gk_player->injured == '1') ?
                                                'Yes' : 'No'}}</h6>
                                        </div>
                                        <div class="match-team match-width">
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </div>
                                    </li>
                                    @endforeach
                               
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="tab-content tab-content-2">
                        <div class="fanatiqs_leagues-inner-content fanatiqs-header-main">
                            <div class="matches-list">
                                <ul class="match-team-header fanatiqs-header">
                                    <li class="match-item header-color">
                                        <div class="match-team match-width">
                                            <div class="match-team-inner">
                                                <h6>Selected By</h6>
                                            </div>
                                        </div>
                                        <div class="match-info match-width">
                                            <h6>Team</h6>
                                        </div>
                                        <div class="match-team match-width">
                                            <div class="match-team-inner">
                                                <h6>Age</h6>
                                            </div>
                                        </div>
                                        <div class="match-team match-width">
                                            <div class="match-team-inner">
                                                <h6>Injured</h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="table-color fanatiqs-table">
                                @foreach ($organizedPlayers['Defender'] as $def_player)

                                    <li class="match-item" data-team-id="{{$def_player->player_team_id}}"
                                        data-player-id="{{$def_player->player_id}}" data-player-role="D"
                                        data-player-name="{{$def_player->name}}"
                                        data-team-logo="{{$def_player->team_logo}}"
                                        data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing"
                                        data-home-team="{{ $matchDetails[0]->home_team_id }}"
                                        data-away-team="{{ $matchDetails[0]->away_team_id }}"
                                        data-slug-matchid="{{ $matchDetails[0]->id }}">
                                        <div class="match-team match-width">
                                            <h6> {{ $def_player->name }}</h6>
                                        </div>
                                        <div class="match-info match-width">
                                            <img src="{{$def_player->team_logo}}" alt="logo">
                                        </div>
                                        <div class="match-team match-width">
                                            <h6>{{$def_player->age}}</h6>
                                        </div>
                                        <div class="match-team match-width">
                                            <h6>{{ ($def_player->injured == '1') ?
                                                'Yes' : 'No'}}</h6>
                                        </div>
                                        <div class="match-team match-width">
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </div>
                                    </li>
                                    @endforeach
                                
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="tab-content tab-content-3">
                        <div class="fanatiqs_leagues-inner-content fanatiqs-header-main">
                            <div class="matches-list">
                                <ul class="match-team-header fanatiqs-header">
                                    <li class="match-item header-color">
                                        <div class="match-team match-width">
                                            <div class="match-team-inner">
                                                <h6>Selected By</h6>
                                            </div>
                                        </div>
                                        <div class="match-info match-width">
                                            <h6>Team</h6>
                                        </div>
                                        <div class="match-team match-width">
                                            <div class="match-team-inner">
                                                <h6>Age</h6>
                                            </div>
                                        </div>
                                        <div class="match-team match-width">
                                            <div class="match-team-inner">
                                                <h6>Injured</h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="table-color fanatiqs-table">
                                @foreach ($organizedPlayers['Midfielder'] as $mid_player)

                                    <li class="match-item" data-team-id="{{$mid_player->player_team_id}}"
                                        data-player-id="{{$mid_player->player_id}}" data-player-role="M"
                                        data-player-name="{{$mid_player->name}}"
                                        data-team-logo="{{$mid_player->team_logo}}"
                                        data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing"
                                        data-home-team="{{ $matchDetails[0]->home_team_id }}"
                                        data-away-team="{{ $matchDetails[0]->away_team_id }}"
                                        data-slug-matchid="{{ $matchDetails[0]->id }}">
                                        <div class="match-team match-width">
                                            <h6> {{ $mid_player->name ?? '' }}</h6>
                                        </div>
                                        <div class="match-info match-width">
                                            <img src="{{$mid_player->team_logo ?? ''}}" alt="logo">
                                        </div>
                                        <div class="match-team match-width">
                                            <h6>{{$mid_player->age ?? ''}}</h6>
                                        </div>
                                        <div class="match-team match-width">
                                            <h6>{{ ($mid_player->injured  == '1') ?
                                                'Yes' : 'No'}}</h6>
                                        </div>
                                        <div class="match-team match-width">
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </div>
                                    </li>
                                    @endforeach
                              
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content tab-content-4">
                        <div class="fanatiqs_leagues-inner-content fanatiqs-header-main">
                            <div class="matches-list">
                                <ul class="match-team-header fanatiqs-header">
                                    <li class="match-item header-color">
                                        <div class="match-team match-width">
                                            <div class="match-team-inner">
                                                <h6>Selected By</h6>
                                            </div>
                                        </div>
                                        <div class="match-info match-width">
                                            <h6>Team</h6>
                                        </div>
                                        <div class="match-team match-width">
                                            <div class="match-team-inner">
                                                <h6>Age</h6>
                                            </div>
                                        </div>
                                        <div class="match-team match-width">
                                            <div class="match-team-inner">
                                                <h6>Injured</h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="table-color fanatiqs-table">
                                @foreach ( $organizedPlayers['Attacker'] as $st_player)

                                    <li class="match-item" data-team-id="{{$st_player->player_team_id}}"
                                        data-player-id="{{$st_player->player_id}}" data-player-role="F"
                                        data-player-name="{{$st_player->name}}"
                                        data-team-logo="{{$st_player->team_logo}}"
                                        data-match-id="{{$matchDetails[0]->fixture_id}}" data-team-name="testing"
                                        data-home-team="{{ $matchDetails[0]->home_team_id }}"
                                        data-away-team="{{ $matchDetails[0]->away_team_id }}"
                                        data-slug-matchid="{{ $matchDetails[0]->id }}">
                                        <div class="match-team match-width">
                                            <h6> {{ $st_player->name }}</h6>
                                        </div>
                                        <div class="match-info match-width">
                                            <img src="{{$st_player->team_logo}}" alt="logo">
                                        </div>
                                        <div class="match-team match-width">
                                            <h6>{{$st_player->age}}</h6>
                                        </div>
                                        <div class="match-team match-width">
                                            <h6>{{ ($st_player->injured == '1') ?
                                                'Yes' : 'No'}}</h6>
                                        </div>
                                        <div class="match-team match-width">
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </div>
                                    </li>
                                    @endforeach
                                
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="team-btns text-center">
                <a href="{{ route('my-team') }}" class="next-btn">Next</a>
            </div>

        </div>
    </div>
</div>

<!-- Leagues Content Section End -->

@endsection

@section('custom-script')


<script>
    $(document).ready(function () {

        var myTeam = @json(Session::get('myTeam', []));

        $('.div-tbl ul li').each(function () {
            var row = $(this);
            var leagueId = "{{$matchDetails[0]->league->league_id}}";

            // console.log(leagueId,'league_id');
            // console.log(myTeam,'myjson');

            var teamId = row.data('team-id');
            var playerId = row.data('player-id');
            var playerRole = row.data('player-role');
            var playerName = row.data('player-name');

            var playerExists = myTeam.some(function (player) {
                return player.team_id == teamId && player.player_id == playerId && player
                    .player_role == playerRole && player.player_name == playerName && player
                    .league_id == leagueId;
            });

            if (playerExists) {
                row.find('.plus').addClass('d-none');
                row.find('.minus').removeClass('d-none');
            } else {
                row.find('.plus').removeClass('d-none');
                row.find('.minus').addClass('d-none');
            }
        });

        $('.next-btn').click(function (e) {
            e.preventDefault();

            var nextBtn = $(this);

            $.get("{{ route('current-team-count') }}", function (data, status) {
                if (data.success == true && data.count != 11) {
                    $("#error-message").html('Your team must have exactly 11 players.');
                    $("#errorModal2").modal('show');
                    console.log('ddd');
                } else {
                    console.log('testing');
                    window.location.href = nextBtn.attr('href');
                }
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.player-toggle', function () {

            var team_id = $(this).closest('tr').data('team-id');
            var player_id = $(this).closest('tr').data('player-id');
            var player_role = $(this).closest('tr').data('player-role');
            var leagueId = "{{$matchDetails[0]->league->league_id}}";
            var player_name = $(this).closest('tr').data('player-name');
            var team_logo = $(this).closest('tr').data('team-logo');
            var match_id = $(this).closest('tr').data('match-id');
            var team_name = $(this).closest('tr').data('team-name');
            var homeTeamId = $(this).closest('tr').data('home-team');
            var awayTeamId = $(this).closest('tr').data('away-team');
            var dbMatchId = $(this).closest('tr').data('slug-matchid');

            var button = $(this); // Store reference to the clicked button
            var isPlus = button.hasClass('plus'); // Check if the clicked button is a "plus" button
            var event = $(this).data('event');
            var formData = {
                team_id: team_id,
                player_id: player_id,
                player_role: player_role,
                leagueId: leagueId,
                player_name: player_name,
                event: event,
                team_logo: team_logo,
                match_id: match_id,
                team_name: team_name,
                homeTeamId: homeTeamId,
                awayTeamId: awayTeamId,
                dbMatchId: dbMatchId,
            };

            $.ajax({
                url: "{{ route('create-team') }}",
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.success == true) {
                        if (isPlus) {
                            button.addClass('d-none');
                            button.siblings('.minus').removeClass('d-none');
                            button.parent('li').parent('ul').addClass('select-player');
                        } else {
                            button.addClass('d-none');
                            button.siblings('.plus').removeClass('d-none');
                            button.parent('li').parent('ul').removeClass('select-player');

                        }
                    } else {
                        $("#error-message").html(response.message);
                        $("#errorModal2").modal('show');

                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });



    });

</script>


@endsection
