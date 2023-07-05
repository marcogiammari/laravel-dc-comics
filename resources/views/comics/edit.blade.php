@extends('comics.layouts.app')

@section('content')
    <section class="bg-light">
        <div class="container py-5">
            <h2>Edit comic</h2>
            <form action="{{ route('comics.update', $comic) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="inputTitle" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="inputTitle" value="{{ $comic->title }}">
                </div>
                <div class="mb-3">
                    <label for="textareaDesc">Description</label>
                    <textarea name="description" class="form-control" id="textareaDesc">{{ $comic->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="inputThumb" class="form-label">Thumb</label>
                    <input name="thumb" type="text" class="form-control" id="inputThumb" value="{{ $comic->thumb }}">
                </div>
                <div class="mb-3">
                    <label for="inputPrice" class="form-label">Price</label>
                    <input name="price" type="text" class="form-control" id="inputPrice" value="{{ $comic->price }}">
                </div>
                <div class="mb-3">
                    <label for="inputSeries" class="form-label">Series</label>
                    <input name="series" type="text" class="form-control" id="inputSeries" value="{{ $comic->series }}">
                </div>
                <div class="mb-3">
                    <label for="inputType" class="form-label">Type</label>
                    <input name="type" type="text" class="form-control" id="inputType" value="{{ $comic->type }}">
                </div>
                <div class="mb-3">
                    <label for="inputSaleDate" class="form-label">Sale Date</label>
                    <input name="sale_date" type="date" class="form-control" id="inputSaleDate"
                        value="{{ $comic->sale_date }}">
                </div>
                <div class="mb-3">
                    <label for="inputArtists" class="form-label">Artists</label>
                    <input name="artists" type="text" class="form-control" id="inputArtists"
                        value="{{ json_decode($comic->artists) }}">
                </div>
                <div class="mb-3">
                    <label for="inputWriters" class="form-label">Writers</label>
                    <input name="writers" type="text" class="form-control" id="inputWriters"
                        value="{{ json_decode($comic->writers) }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </section>
@endsection
