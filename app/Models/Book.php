<?php
    declare(strict_types=1);
    namespace App\Models;
    use App\Models\Author;
    use App\Models\Genre;

    class Book{
        public int $id;
        public string $title;
        public ?string $date;
        public ?string $edition;
        public ?string  $collection;
        public ?string $resume;
        public ?string $image;
        public Author | array | null $authors;
        public Genre | array | null $genres;

        public function __construct(
            int $id,
            string $title,
            ?string $date,
            ?string $edition,
            ?string $collection,
            ?string $resume,
            ?string $image,
            Author | array | null $author,
            Genre | array | null $genre
        ){
            $this->id = $id;
            $this->title = $title;
            $this->date = $date;
            $this->resume = $resume;
            $this->image = $image;
            $this->edition = $edition;
            $this->collection = $collection;
            $this->authors = $author;
            $this->genres = $genre;
        }
    }
?>