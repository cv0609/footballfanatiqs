@extends('front_end.layout.main')
@section('content')
<!-- Leagues Content Section Start -->
<section class="scoccer">
    <div class="container">
        <div class="scoccer-inner">
            <div class="back-btn">
                <a href="{{ route('leagues') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#fff">
                        <path d="M360-240 120-480l240-240 56 56-144 144h568v80H272l144 144-56 56Z"></path>
                    </svg>
                </a>
            </div>
            <h2>{{ $matches[0]->league->name.' '.$matches[0]->league->year }} Sezóna </h2>

            <div class="team-view-sec">

            </div>
            <div class="scoccer-inner-content">
                <div class="matches-table">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">Tým</th>
                                <th scope="col">Detaily zápasu</th>
                                <th scope="col">Tým</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matches as $key => $matche)
                            @php
                            $startSoonMatch = getMatchStatus($matche->fixture_date);
                            @endphp
                            <tr class="matche-main" data-fixture-id="{{ $matche->id}}"
                                data-league-id="{{$matches[0]->league->league_id}}"
                                data-home-team="{{ $matche->home_team_id }}"
                                data-away-team="{{ $matche->away_team_id }}">
                                <td class="match-team-logo">
                                    {{-- <img src="" alt="team-logo-3" class="lazy-load"> --}}
                                    <img class="lazy-load" data-src="{{ $matche->home_team_logo }}" alt="team-logo">

                                    {{-- <span>SHL</span> --}}
                                    <h6>{{ $matche->home_team_name }}</h6>

                                    @if($matche->short_status == 'LIVE' || $matche->short_status == '1H' ||
                                    $matche->short_status == 'HT' || $matche->short_status == '2H' ||
                                    $matche->short_status == 'ET' || $matche->short_status == 'BT' ||
                                    $matche->short_status == 'P' || $matche->short_status == 'SUSP' ||
                                    $matche->short_status == 'INT' || $matche->short_status == 'INT')

                                    <div id="Head-Banner">
                                        <span id="Head-Banner-Text">LIVE ({{ $matche->long_status }})</span>
                                    </div>

                                    @elseif((isset($startSoonMatch) && !empty($startSoonMatch) && $startSoonMatch <= 40)
                                        || ( $startSoonMatch=='0' )) <div id="Head-Banner">
                                        <span id="Head-Banner-Text">Start In {{ $startSoonMatch.' mints' }}</span>
                </div>

                @endif
                </td>
                <td>
                    <h6>{{$matche->venue_name}}</h6>
                    <p>{{$matche->venue_city}}</p>
                    <span>{{ date('Y-m-d h:i a',strtotime($matche->fixture_date))}}</span>

                </td>

                <td class="match-team-logo">
                    {{-- <span>CNGZ</span> --}}
                    {{-- <img src="{{ $matche['teams']['away']['logo'] }}" alt="team-logo-2"> --}}
                    <img class="lazy-load" data-src="{{ $matche->away_team_logo }}" alt="team-logo">
                    <h6>{{ $matche->away_team_name }}</h6>
                </td>


                </tr>
                @endforeach
                </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>

    <!-- alert-msg popup start -->
    <div class="alert-msg">
        <div class="modal fade" id="errorModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#d30f0f">
                                <path
                                    d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                </svg>
                        </span>
                        <h4 id="error-message"></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- alert-msg popup end -->
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
