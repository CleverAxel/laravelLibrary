<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("book")->insert([
            [
                "title" => "Harry Potter à l'école des sorciers",
                "resume" => "Il va à l'école",
                "parution" => "1997-01-01",
                "idEdition"=> "2"
            ],
            [
                "title" => "Harry Potter et la chambre des secrets",
                "resume" => "Il va à l'école de nouveau",
                "parution" => "1998-01-01",
                "idEdition"=> "2"
            ],
            [
                "title" => "Harry Potter et le prisonnier d'Azkaban",
                "resume" => "Il va à l'école de nouveau",
                "parution" => "2000-01-01",
                "idEdition"=> "2"
            ],
            [
                "title" => "Seul sur Mars",
                "resume" => "Il est dans la merde sur une planète hostile",
                "parution" => "2015-01-01",
                "idEdition" => null,
            ],
            [
                "title" => "Astérix le Gaulois",
                "resume" => "C'est un petit Gaulois",
                "parution" => "1977-01-01",
                "idEdition"=> "1"
            ]
        ]);
    }
}
