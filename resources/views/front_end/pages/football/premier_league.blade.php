@extends('front_end.layout.main')
@section('content')
    <!-- Leagues Content Section Start -->
    <section class="scoccer">
        <div class="container">
            <div class="scoccer-inner">

                <h2>{{ date('Y') }} Sezóna </h2>
                @if(Session::has('success'))
                    <span class="alert alert-success text-center" style="width:100%;">{{ Session::get('success') }}</span>
                    @elseif(Session::has('error'))
                    <span class="alert alert-danger text-center" style="width:100%;">{{ Session::get('error') }}</span>

                @endif
                <div class="team-view-sec">

                </div>
                <div class="scoccer-inner-content">
                    <div class="leagues-table">
                        <table id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Liga</th>
                                    <th scope="col">Typ</th>
                                    <th scope="col">Datum zahájení</th>
                                    <th scope="col">Datum ukončení</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($leagues as $key => $league)
                {{-- @php
                  $check_match = checkMatch($league['league']['id']);
                  dump($check_match);
                @endphp --}}
                  {{-- @if($check_match == true) --}}
                    <tr>
                      <td class="league-logo">
                        {{-- <img src="{{ $league['league']['logo'] }}" alt="league-logo"> --}}
                        <img class="lazy-load" data-src="{{ $league->logo }}" alt="league-logo">

                        <a href="{{ route('leagueMatches',['leagueId'=>$league->id]) }}"></a>
                      </td>
                      <td>
                        <h6>{{ $league->name }}</h6>
                        <a href="{{ route('leagueMatches',['leagueId'=>$league->id]) }}"></a>
                      </td>
                      <td>
                        <p>{{ $league->type }}</p>
                        <a href="{{ route('leagueMatches',['leagueId'=>$league->id]) }}"></a>
                      </td>
                      <td>
                        <p>{{ $league->start_date }}</p>
                        <a href="{{ route('leagueMatches',['leagueId'=>$league->id]) }}"></a>
                      </td>
                      <td>
                        <p>{{ $league->end_date }}</p>
                        <a href="{{ route('leagueMatches',['leagueId'=>$league->id]) }}"></a>
                      </td>
                    </tr>
                  {{-- @endif --}}
                @endforeach
                        
                            </tbody>
                        </table>
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

  document.addEventListener("DOMContentLoaded", function() {
      lazyLoading();
  });


  $(document).ready(function() {
      $(document).on('click', '.dt-paging-button', function() {
        lazyLoading();
      });

      $('.dt-input').on('keyup change', function () {
         lazyLoading();
      });
  });


  function lazyLoading(){

    let lazyImages = [].slice.call(document.querySelectorAll("img.lazy-load"));

    if ("IntersectionObserver" in window) {
      let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
          entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                  let lazyImage = entry.target;
                  lazyImage.src = lazyImage.dataset.src;
                  lazyImage.classList.remove("lazy-load");
                  lazyImageObserver.unobserve(lazyImage);
                }
          });
      });

      lazyImages.forEach(function(lazyImage) {
          lazyImageObserver.observe(lazyImage);
      });
    } else {
      // Fallback for older browsers
      lazyImages.forEach(function(lazyImage) {
          lazyImage.src = lazyImage.dataset.src;
      });
    }
  }
</script>
@endsection
