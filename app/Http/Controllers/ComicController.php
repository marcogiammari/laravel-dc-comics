<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comic;

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

    private function validateComic($data)
    {

        $today_date = date('m/d/Y', time());

        $validator = Validator::make($data, [
            'title' => 'required|min:3|max:30',
            'description' => 'nullable:max:1000',
            'thumb' => 'nullable|url|max:1000',
            'price' => 'required|max:20',
            'series' => 'required|max:50',
            'type' => 'required',
            'sale_date' => 'required|date|before:' . $today_date,
            'artists' => 'nullable|max:300',
            'writers' => 'nullable|max:300',

        ], [
            "title.required" => "Inserire un titolo",
            "title.min" => "Il titolo deve essere almeno di :min caratteri",
            "title.max" => "Il titolo non deve superare i :max caratteri",
            "description.max" => "La descrizione non deve superare i :max caratteri",
            "thumb.max" => "L'indirizzo non deve superare i :max caratteri",
            "thumb.url" => "Inserisci un indirizzo valido",
            "price.required" => "Inserire un prezzo",
            "series.required" => "Inserire una serie",
            "series.max" => "La serie non deve superare i :max caratteri",
            "type.required" => "Inserire un tipo",
            "sale_date.required" => "Inserire una data",
            "sale_date.date" => "Inserire una data di formato gg/mm/aa",
            "sale_date.before" => "Inserire una data anteriore a :date",
            "artists.max" => "La sezione disegnatori non deve superare i :max caratteri",
            "writers.max" => "La sezione autori non deve superare i :max caratteri"

        ])->validate();

        return $validator;
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
    public function store(Request $request)
    {
        $data = $this->validateComic($request->all());

        $newComic = new Comic();

        $newComic->title = $data['title'];
        $newComic->description = $data['description'] ?? 'n/a';
        $newComic->thumb = $data['thumb'] ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuPeP8dYU_aXA7VYoN0OAzkr7dxo3WhRTb2Tadzc0sfDW8tLLiOSbdO-PdtHMs2EIdXSU&usqp=CAU';
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->type = $data['type'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->artists = json_encode($data['artists'] ?? 'n/a');
        $newComic->writers = json_encode($data['writers'] ?? 'n/a');

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
    public function update(Request $request, Comic $comic)
    {
        $data = $this->validateComic($request->all());


        $comic->title = $data['title'];
        $comic->description = $data['description'] ?? 'n/a';
        $comic->thumb = $data['thumb'] ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuPeP8dYU_aXA7VYoN0OAzkr7dxo3WhRTb2Tadzc0sfDW8tLLiOSbdO-PdtHMs2EIdXSU&usqp=CAU';
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->type = $data['type'];
        $comic->sale_date = $data['sale_date'];
        $comic->artists = json_encode($data['artists'] ?? 'n/a');
        $comic->writers = json_encode($data['writers'] ?? 'n/a');

        $comic->update();

        // pattern POST/REDIRECT/GET per evitare il problema del reinvio del form
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
