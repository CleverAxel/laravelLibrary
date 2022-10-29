<?php
namespace App\Mapper;
use App\Models\Author;

class AuthorMapper{
    public static function mapAuthor($author){
        return new Author($author->id, $author->name);
    }
}
?>