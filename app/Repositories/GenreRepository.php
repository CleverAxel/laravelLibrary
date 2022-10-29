<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Mapper\GenreMapper;
use Illuminate\Support\Facades\DB;

class GenreRepository{
    public function getAll(){
        $genres = [];
        $genres = DB::select("SELECT * FROM genre ORDER BY name");

        $genres = array_map(function($genre){
            return GenreMapper::mapGenre($genre);
        },$genres);

        return $genres;
    }
}
?>