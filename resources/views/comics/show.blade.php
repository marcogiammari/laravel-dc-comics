@extends('comics.layouts.app')

@section('content')
    <section class="bg-light">
        <div id="banner-primary"></div>
        <div id="primary-info" class="container py-5">
            <div class="img-wrapper position-relative">
                <img class="img-fluid position-absolute z-0" src="{{ $comic['thumb'] }}" alt="{{ $comic['title'] }}">
                <span class="position-absolute">COMIC BOOK</span>
                <span class="position-absolute bottom-0 w-100 text-center">VIEW GALLERY</span>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8 d-flex flex-column gap-3 p-0">
                        <h2 class="fs-1 py-2">{{ $comic['title'] }}</h2>
                        <div class="price row m-0">
                            <div class="col-8 d-flex justify-content-between align-items-center p-3">
                                <p class="d-flex gap-2 m-0">U.S. Price
                                    <span class="text-white d-flex justify-content-between align-items-center">
                                        {{ $comic['price'] }}
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
                                {{ $comic['description'] }}
                            </p>
                        </div>
                    </div>
                    <div class="col-4 d-flex flex-column">
                        <p class="align-self-end">ADVERTISING</p>
                        <img src="{{ Vite::asset('/resources/images/adv.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <form class="w-auto" action="{{ route('comics.destroy', $comic) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="DELETE COMIC">
                </form>
                <a class="w-auto" href="{{ route('comics.edit', $comic) }}">
                    <button class="btn btn-primary">EDIT COMIC</button>
                </a>
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
                                {{ json_decode($comic['artists']) }}
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
                                {{ json_decode($comic['writers']) }}
                            </span>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-6 d-flex flex-column gap-3">
                    <h2 class="fs-2">Specs</h2>
                    <div>
                        <hr>
                        Series: <span class="my-txt-secondary">{{ $comic['series'] }}</span>
                        <hr>
                        U.S. Price: <span class="my-txt-secondary">{{ $comic['price'] }}</span>
                        <hr>
                        On Sale Date: <span class="my-txt-secondary">{{ $comic['sale_date'] }}</span>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
