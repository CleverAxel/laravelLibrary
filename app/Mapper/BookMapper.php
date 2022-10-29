<?php
    declare(strict_types=1);
    namespace App\Mapper;
    use App\Models\Author;
    use App\Models\Book;
    use App\Models\Genre;
use Illuminate\Support\Arr;

    class BookMapper{
        public static function mapBook($book){
            $authors = json_decode($book->author);
            $genres = json_decode($book->genre);

            $authors = is_null($authors[0]->id)
                ? null
                : array_map(function($author){
                        return new Author($author->id, $author->name);
                    },$authors);

            $genres = is_null($genres[0]->id)
                ? null
                : array_map(function($genre){
                        return new Genre($genre->id, $genre->name);
                    },$genres);

            return new Book(
                $book->bookId, 
                $book->title, 
                $book->date,
                $book->edition, 
                $book->collection,
                $book->resume,
                $book->image,
                $authors,
                $genres
            );
        }

        private static function sortAuthAndGenreById($values){
            if(is_null($values)) return null;

            return Arr::sort($values, function($value){
                return $value->id;
            });
        }
    }
    
?>