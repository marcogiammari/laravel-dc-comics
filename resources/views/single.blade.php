@extends('layouts.app')

@section('content')

<section class="bg-light">
    <div id="banner-primary"></div>
    <div id="primary-info" class="container py-5">
        <div class="img-wrapper position-relative">
            <img class="img-fluid position-absolute z-0" src="{{$cards[$param]['thumb']}}" alt="{{$cards[$param]['title']}}">
            <span class="position-absolute">COMIC BOOK</span>
            <span class="position-absolute bottom-0 w-100 text-center">VIEW GALLERY</span>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 d-flex flex-column gap-3 p-0">
                    <h2 class="fs-1 py-2">{{ $cards[$param]['title'] }}</h2>
                    <div class="price row m-0">
                        <div class="col-8 d-flex justify-content-between align-items-center p-3">
                            <p class="d-flex gap-2 m-0">U.S. Price 
                                <span class="text-white d-flex justify-content-between align-items-center">
                                    {{$cards[$param]['price']}}
                                </span>
                            </p>
                            <p class="m-0">Available</p>
                        </div>
                        <div class="col-4 d-flex justify-content-center align-items-center p-3">
                            <p class="m-0 text-white">Check Availability</p>
                        </div>
                    </div>
                    <div class="desc row m-0">
                        <p class="m-0 p-0">
                            {{$cards[$param]['description']}}
                        </p>
                    </div>
                </div>
                <div class="col-4 d-flex flex-column">
                    <p class="align-self-end">ADVERTISING</p>
                    <img src="{{Vite::asset('/resources/images/adv.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section id="secondary-info">
    <div class="container py-5">
        <div class="row">
            <div class="col-6 d-flex flex-column gap-3">
                <h2 class="fs-2 py-2">Talent</h2>
                <div class="row">
                    <hr>
                    <div class="col-4">
                        Art by: 
                    </div>
                    <div class="col-8">
                        <span class="my-txt-secondary">
                            @foreach ($cards[$param]['artists'] as $artist)
                            {{ $artist }}
                            @endforeach
                        </span>
                    </div>
                </div>
                <div class="row">
                    <hr>
                    <div class="col-4">
                        Written by: 
                    </div>
                    <div class="col-8">
                        <span class="my-txt-secondary">
                            @foreach ($cards[$param]['writers'] as $writer)
                            {{ $writer }}
                            @endforeach
                        </span>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-6 d-flex flex-column gap-3">
                <h2 class="fs-2">Specs</h2>
                <div>
                    <hr>
                    Series: <span class="my-txt-secondary">{{$cards[$param]['series']}}</span>
                    <hr>
                    U.S. Price: <span class="my-txt-secondary">{{$cards[$param]['price']}}</span>
                    <hr>
                    On Sale Date: <span class="my-txt-secondary">{{$cards[$param]['sale_date']}}</span>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


