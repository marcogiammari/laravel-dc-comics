<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');

        for ($i = 0; $i < count($comics); $i++) {
            $el = $comics[$i];
            $newComic = new Comic();

            $newComic->title = $el['title'];
            $newComic->description = $el['description'];
            $newComic->thumb = $el['thumb'];
            $newComic->price = $el['price'];
            $newComic->series = $el['series'];
            $newComic->type = $el['type'];
            $newComic->sale_date = $el['sale_date'];
            $newComic->artists = json_encode(implode(",", $el['artists']));
            $newComic->writers = json_encode(implode(",", $el['writers']));

            $newComic->save();
        }
    }
}
