<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');
        foreach ($comics as $comic) {
            foreach ($comic['artists'] as $artist) {
                $newArtist = new Artist();
                $newArtist->comic_id = rand(1, count($comics));
                $newArtist->name = $artist;
                $newArtist->save();
            }
        }
    }
}
