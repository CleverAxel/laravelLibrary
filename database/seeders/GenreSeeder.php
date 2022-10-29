<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("genre")->insert([
            [
                "name" => "bande-dessinée",
            ],
            [
                "name" => "roman",
            ],
            [
                "name" => "fantastique",
            ],
            [
                "name" => "science-fiction"
            ]
        ]);
    }
}
