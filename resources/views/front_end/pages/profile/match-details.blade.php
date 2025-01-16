@extends('front_end.layout.main')
@section('content')

@php
   $PointCalculationService = app(App\Services\PointCalculationService::class);
   use Carbon\Carbon;
@endphp

<section class="matches-details scoccer ">
    <div class="container">


        <div class="scoccer-inner">
            <div class="back-btn">
                <a href="{{ route('profile.matches') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#fff">
                        <path d="M360-240 120-480l240-240 56 56-144 144h568v80H272l144 144-56 56Z"></path>
                    </svg>
                </a>
            </div>
            <h2>2023-24 Season </h2>

            <div class="plyr-headr">
                <div class="team-logo">
                    <div class="team_inner">
                        <div class="match-details-header-logo match-details-header-logo1"></div>
                        <!-- <span>HKR</span> -->
                    </div>
                    <h6>{{ $matchDetails->home_team_name ?? '' }}</h6>
                </div>
                <div class="match-details">
                <h6>{{ $matchDetails->venue_name ?? '' }}</h6>
                <p>{{ $matchDetails->venue_city ?? ''}}</p>
                <span>{{ date('Y-m-d h:i a', strtotime($matchDetails->fixture_date ?? '')) }}</span>
                </div>
                <div class="team-logo">
                    <div class="team_inner">
                        <!-- <span>TEP</span> -->
                        <div class="match-details-header-logo match-details-header-logo2 "></div>
                    </div>
                    <h6>{{ $matchDetails->away_team_name ?? '' }}</h6>
                </div>
            </div>

            <div class="tab-content-wrapper">
                <div class="toggle-target">
                    <a href="#" class="tab active" data-toggle-target=".tab-content-1">Obránce</a>
                    <a href="#" class="tab" data-toggle-target=".tab-content-2">Útočník</a>
                    <a href="#" class="tab" data-toggle-target=".tab-content-3">Brankář</a>
                    <a href="#" class="tab" data-toggle-target=".tab-content-4">Brankář</a>
                </div>

                <div class="tab-content tab-content-1 active">
                    <div class="scoccer-inner-content">
                        <div class="matches-table matche-det">
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col" class="">Sélectionné par</th>
                                        <th scope="col">Équipe</th>
                                        <th scope="col">Stáří</th>
                                        <th scope="col">Ublížit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($teams[0]->teamDetails ?? [] as $data)
                                       @php
                                          $points = $PointCalculationService->getPlayerStatistics(Auth::user()->id,$matchId,$data->player_id);
                                       @endphp
                                    <tr>

                                        <td class="player-name">
                                            <p>{{$data->player_name}}</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                            <img src="{{$data->player_team_logo}}" alt="team-logo-3">

                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>{{ $points }}</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>{{ $points }}</span>
                                            <!-- <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button> -->
                                        </td>
                                    </tr>
                                    @endforeach
            
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="tab-content tab-content-2">
                    <div class="scoccer-inner-content">
                        <div class="matches-table matche-det">
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col" class="">Sélectionné par</th>
                                        <th scope="col">Équipe</th>
                                        <th scope="col">Stáří </th>
                                        <th scope="col">Ublížit </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td class="player-name">
                                            <p>Tomáš Petrášek</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner8"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>12</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="player-name">
                                            <p>Tomáš Petrášek</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner9"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>07</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="player-name">
                                            <p>Tomáš Petrášek</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner10"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>67</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="player-name">
                                            <p>Tomáš Petrášek</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner11"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>57</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="player-name">
                                            <p>Tomáš Petrášek</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner12"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>37</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="player-name">
                                            <p>Tomáš Petrášek</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner13"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>57</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="player-name">
                                            <p>Tomáš Petrášek</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner14"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>17</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="tab-content tab-content-3">
                    <div class="scoccer-inner-content">
                        <div class="matches-table matche-det">
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col" class="">Sélectionné par</th>
                                        <th scope="col">Équipe</th>
                                        <th scope="col">Stáří </th>
                                        <th scope="col">Ublížit </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td class="player-name">
                                            <p>Adam Vlkanova</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner15"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>12</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="tab-content tab-content-4">
                    <div class="scoccer-inner-content">
                        <div class="matches-table matche-det">
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col" class="">Sélectionné par</th>
                                        <th scope="col">Équipe</th>
                                        <th scope="col">Stáří </th>
                                        <th scope="col">Ublížit </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td class="player-name">
                                            <p>Adam Vlkanova</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner15"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>12</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="player-name">
                                            <p>Adam Vlkanova</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner16"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>07</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="player-name">
                                            <p>Adam Vlkanova</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner17"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>67</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="player-name">
                                            <p>Adam Vlkanova</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner18"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>57</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="player-name">
                                            <p>Adam Vlkanova</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner19"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>37</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="player-name">
                                            <p>Adam Vlkanova</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner20"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>57</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="player-name">
                                            <p>Adam Vlkanova</p>
                                        </td>
                                        <td class="match-team-logo">
                                            <a href="">
                                                <div class="match-team-logo-inner match-team-logo-inner21"></div>
                                            </a>
                                        </td>

                                        <td class="match-position">
                                            <p>17</p>
                                        </td>
                                        <td class="credits_points">
                                            <span>No</span>
                                            <button class="plus player-toggle" data-event="plus">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                            <button class="minus player-toggle d-none" data-event="minus">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="team-btns">
                <a href="my-team" class="next-btn">Suivant</a>
            </div>
        </div>
    </div>

</section>
<!-- Leagues Content Section End -->
@endsection
