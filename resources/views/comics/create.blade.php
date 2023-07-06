@extends('comics.layouts.app')

@section('content')
    <section class="bg-light">
        <div class="container py-5">
            <h2>Add new comic</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('comics.store') }}" method="post" class="needs-validation">
                @csrf

                <div class="mb-3">

                    <label for="inputTitle" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                        id="inputTitle" value="{{ old('title') }}">

                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="mb-3">

                    <label for="textareaDesc">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="textareaDesc">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">

                    <label for="inputThumb" class="form-label">Thumb</label>
                    <input name="thumb" type="text" class="form-control @error('thumb') is-invalid @enderror"
                        id="inputThumb" value="{{ old('thumb') }}">
                    @error('thumb')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">

                    <label for="inputPrice" class="form-label">Price</label>
                    <input name="price" type="number" step=".10"
                        class="form-control @error('price') is-invalid @enderror" id="inputPrice"
                        value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">

                    <label for="inputSeries" class="form-label">Series</label>
                    <input name="series" type="text" class="form-control @error('series') is-invalid @enderror"
                        id="inputSeries" value="{{ old('series') }}">
                    @error('series')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">

                    <label for="inputType" class="form-label">Type</label>
                    <select name="type" class="form-control" id="inputType">
                        <option value="" @selected(!old('type')) disabled hidden>Select type</option>
                        @foreach ($types as $type)
                            <option @selected(old('type') == $type->type) value="{{ $type->type }}">{{ $type->type }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3">
                    <label for="inputSaleDate" class="form-label">Sale Date</label>
                    <input name="sale_date" type="date" class="form-control @error('sale_date') @enderror"
                        id="inputSaleDate" value="{{ old('sale_date') }}">
                    @error('sale_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="inputArtists" class="form-label">Artists</label>
                    <input name="artists" type="text" class="form-control" id="inputArtists"
                        value="{{ old('artists') }}">
                </div>
                <div class="mb-3">
                    <label for="inputWriters" class="form-label">Writers</label>
                    <input name="writers" type="text" class="form-control" id="inputWriters"
                        value="{{ old('artists') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </section>
@endsection
