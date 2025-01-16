@extends('front_end.layout.main')
@section('title','Leaques')
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
                        Leagues
                    </h3>
                </li>
            </ul>
        </div>
    </div>
</section>
<!--Leagues Pages Banner Section End -->


<!-- Leagues Content Section Start -->
<section class="fanatiqs_leagues vd_naive leagues">
    <video autoplay muted loop class="background-video">
        <source src="{{ asset('assets/images/0_Soccer_Football_3840x2160.mp4') }}" type="video/mp4">
    </video>
    <div class="container">
        <div class="fanatiqs_leagues-inner py-5">

            <h2 class="text-center leagues-h2">{{ (date('Y') - 1).'-'.date('Y') }} Season</h2>
            <div class="fanatiqs_leagues-inner-content">
                <div class="leagues-list">

                    <ul>
                    @foreach ($leagues as $key => $league)
                        <li class="league-item">
                            <a href="{{ route('leagueMatches',['leagueId'=>$league->id]) }}">

                                <div class="league-details-main">
                                    <div class="league-details">
                                        <h6>Start Date</h6>
                                        <p class="start-date"> {{ $league->start_date }}</p>
                                    </div>
                                    <div class="league-logo">
                                        <img src="{{ $league->logo }}" alt="logo">
                                        <h6>{{ $league->name }}</h6>
                                        <h6>{{ $league->type }}</h6>
                                    </div>
                                    <div class="league-details">
                                        <h6>End Date</h6>
                                        <p class="start-date"> {{ $league->end_date }}</p>
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
    let table = new DataTable('#myTable');

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
