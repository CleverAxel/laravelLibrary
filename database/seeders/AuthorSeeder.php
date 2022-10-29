<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("author")->insert([
            [
                "name" => "J.R.R Tolkien"
            ],
            [
                "name" => "Georges R.R Martin"
            ],
            [
                "name" => "J.K Rowling"
            ],
            [
                "name" => "René Goscinny"
            ],
            [
                "name" => "Albert Uderzo",
            ]
        ]);
    }
}
