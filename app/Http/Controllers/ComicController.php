<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            "features" => config('store.features'),
            "links" => config('store.links'),
            "footerCols" => config('store.footerCols'),
            "footerSocialMedias" => config('store.footerSocialMedias'),
        ];

        $cards = Comic::all();


        return view('comics.index', compact('cards', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "features" => config('store.features'),
            "links" => config('store.links'),
            "footerCols" => config('store.footerCols'),
            "footerSocialMedias" => config('store.footerSocialMedias'),
        ];

        return view('comics.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newComic = new Comic();
        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->type = $data['type'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->artists = json_encode($data['artists']);
        $newComic->writers = json_encode($data['writers']);

        $newComic->save();
        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        $data = [
            "features" => config('store.features'),
            "links" => config('store.links'),
            "footerCols" => config('store.footerCols'),
            "footerSocialMedias" => config('store.footerSocialMedias'),
        ];

        return view('comics.show', compact('comic', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comic $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        $data = [
            "features" => config('store.features'),
            "links" => config('store.links'),
            "footerCols" => config('store.footerCols'),
            "footerSocialMedias" => config('store.footerSocialMedias'),
        ];

        return view('comics.edit', compact('comic', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Comic $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->type = $data['type'];
        $comic->sale_date = $data['sale_date'];
        $comic->artists = json_encode($data['artists']);
        $comic->writers = json_encode($data['writers']);
        $comic->update();

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comic $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
