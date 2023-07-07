<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
use App\Models\Comic;
use Illuminate\Auth\Events\Validated;

class ComicController extends Controller

{

    private function getData()
    {
        return [
            "features" => config('store.features'),
            "links" => config('store.links'),
            "footerCols" => config('store.footerCols'),
            "footerSocialMedias" => config('store.footerSocialMedias'),
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Comic::all();

        $data = $this->getData();
        return view('comics.index', compact('cards', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->getData();
        $types = Comic::select('type')->distinct()->get()->all();

        return view('comics.create', compact('data', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComicRequest $request)
    {
        $data = $request->validated();

        $newComic = new Comic();
        $data['artists'] = json_encode($data['artists']);
        $data['writers'] = json_encode($data['writers']);
        $newComic->fill($data);

        //LASCIARE ALLA VISTA IL COMPITO DI VISUALIZZARE N/A IN CASO DI VALORE NULL

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
        $data = $this->getData();
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
        $data = $this->getData();
        $types = Comic::select('type')->distinct()->get()->all();

        return view('comics.edit', compact('comic', 'types', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Comic $comic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        $data = $request->validated();
        $data['artists'] = json_encode($data['artists']);
        $data['writers'] = json_encode($data['writers']);
        $comic->fill($data);

        $comic->update();

        // pattern POST/REDIRECT/GET per evitare il problema del reinvio del form
        // return redirect()->route('comics.show', $comic);        
        return to_route('comics.show', $comic);
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
