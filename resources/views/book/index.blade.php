@include("layout.declareHTML", [
        "title" => "Les bouquins",
        "css" => [
            "./css/layout/header.css",
            "./css/book/index.css"
        ]
    ])
@include("layout.header")

<main>
    <h1>Page de navigation des livres</h1>

    <ul>
        <li><a href={{route("getAllBooks", ["page" => 1])}}>Voir tous les livres</a></li>
        <li><a href={{route("createBook")}}>Créer un livre</a></li>
        <li></li>
        <li></li>
    </ul>
</main>

@include("layout.endHTML")