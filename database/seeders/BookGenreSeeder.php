<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("book_genre")->insert([
            [
                "idBook" => "5", //astérix le gaulois
                "idGenre" => "1", //bande dessinée
            ],
            [
                "idBook" => "1",
                "idGenre" => "2",
            ],
            [
                "idBook" => "1",
                "idGenre" => "3",
            ],
            [
                "idBook" => "1",
                "idGenre" => "4",
            ]
        ]);
    }
}
