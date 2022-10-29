<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("author_book")->insert([
                [
                    "idAuthor" => "3",
                    "idBook" => "1",
                ],
                [
                    "idAuthor" => "3",
                    "idBook" => "2",
                ],
                [
                    "idAuthor" => "3",
                    "idBook" => "3",
                ],
                [
                    "idAuthor" => "4",
                    "idBook" => "5",
                ],
                [
                    "idAuthor" => "5",
                    "idBook" => "5",
                ]
            ]);
    }
}
