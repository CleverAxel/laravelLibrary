<?php
namespace App\Mapper;
use App\Models\Genre;

class GenreMapper{
    public static function mapGenre($genre){
        return new Genre($genre->id, $genre->name);
    }
}
?>