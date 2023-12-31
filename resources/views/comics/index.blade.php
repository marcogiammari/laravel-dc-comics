@extends('comics.layouts.app')

@section('content')
    <section class="position-relative">
        <div class="container">
            <h2 id="current-series" class="text-white position-absolute">CURRENT SERIES</h2>
            <div id="cards-wrapper" class="row">
                @foreach ($cards as $i => $card)
                    <div class="my_card col-2 text-center d-flex flex-column gap-3">
                        <div class="img-wrapper">
                            <a href="{{ route('comics.show', $card->id) }}"><img class="img-fluid"
                                    src="@if ($card['thumb']) {{ $card['thumb'] }}
                            @else
                                {{ Vite::asset('/resources/images/na.png') }} @endif"
                                    alt="card.series"></a>
                        </div>
                        <div>
                            <p class="text-white">{{ strtoupper($card['title']) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="load-btn" class="d-flex justify-content-center">
                <button class="btn px-5 rounded-0">
                    <a class="text-white" href="{{ route('comics.create') }}">
                        ADD NEW COMIC
                    </a>
                </button>
            </div>
        </div>
    </section>


    <section id="features">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center text-light">
                @foreach ($data['features'] as $feat)
                    <div class="feature justify-content-center align-items-center col-12 col-md-6 col-lg-3 col-xl-2 my-3">
                        <a href="#" class="d-flex align-items-center gap-3">
                            <img class="img-fluid" src="{{ Vite::asset('/resources/images/' . $feat['path']) }}"
                                alt="{{ $feat['txt'] }}">
                            <span>{{ strtoupper($feat['txt']) }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
