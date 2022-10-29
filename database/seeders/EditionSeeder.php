<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("edition")->insert([
            [
                "name" => "Dargaud",
            ],
            [
                "name" => "Gallimard jeunesse"
            ]
            ]);
    }
}
