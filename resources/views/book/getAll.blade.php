@include("layout.declareHTML", [
        "title" => "Pages des livres",
        "css" => [
            "css/layout/header.css",
            "css/book/index.css",
            "css/book/thumbnailBook.css"
        ]
    ])
@include("layout.header")

<main>
    <h1>Tous les livres</h1>
    @if ($books)        
        @foreach ($books as $book)
            @include("book.thumbnailBook", [
                "title" => $book->title,
                "genres" => $book->genres,
                "authors" => $book->authors,
                "date" => $book->date,
                "edition" => $book->edition,
                "collection" => $book->collection,
                "resume" => $book->resume,
                "image" => $book->image
            ])

        @endforeach
    @else
        {{\App\Helpers\CodeHelper::returnExplanationCode($code)}}
    @endif
</main>

@include("layout.endHTML")