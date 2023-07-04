@extends('comics.layouts.app')

@section('content')
    <section class="bg-light">
        <div class="container py-5">
            <h2>Add new comic</h2>
            <form action="{{ route('comics.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="inputTitle" class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" id="inputTitle">
                </div>
                <div class="mb-3">
                    <label for="textareaDesc">Description</label>
                    <textarea name="description" class="form-control" id="textareaDesc"></textarea>
                </div>
                <div class="mb-3">
                    <label for="inputThumb" class="form-label">Thumb</label>
                    <input name="thumb" type="text" class="form-control" id="inputThumb">
                </div>
                <div class="mb-3">
                    <label for="inputPrice" class="form-label">Price</label>
                    <input name="price" type="text" class="form-control" id="inputPrice">
                </div>
                <div class="mb-3">
                    <label for="inputSeries" class="form-label">Series</label>
                    <input name="series" type="text" class="form-control" id="inputSeries">
                </div>
                <div class="mb-3">
                    <label for="inputType" class="form-label">Type</label>
                    <input name="type" type="text" class="form-control" id="inputType">
                </div>
                <div class="mb-3">
                    <label for="inputSaleDate" class="form-label">Sale Date</label>
                    <input name="sale_date" type="date" class="form-control" id="inputSaleDate">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </section>
@endsection
