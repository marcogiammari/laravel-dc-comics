<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $today_date = date('m/d/Y', time());

        return [
            'title' => 'required|min:3|max:30',
            'description' => 'nullable:max:1000',
            'thumb' => 'nullable|url|max:1000',
            'price' => 'required|max:20',
            'series' => 'required|max:50',
            'type' => 'required',
            'sale_date' => 'required|date|before:' . $today_date,
            'artists' => 'nullable|max:300',
            'writers' => 'nullable|max:300',

        ];
    }

    public function messages()
    {
        return [
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

        ];
    }
}
