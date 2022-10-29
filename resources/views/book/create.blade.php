@include("layout.declareHTML", [
        "title" => "Les bouquins",
        "css" => [
            "./css/layout/header.css",
            "./css/book/create.css"
        ]
    ])
@include("layout.header")

<main>
    <h1>Créer un livre</h1>
    <form action={{route("storeBook")}} method="POST">
        @csrf

        <div>
            <div>
                <label for="title">Titre du livre :</label>
            </div>
            <div>
                <input type="text" name="title" id="title">
            </div>
        </div>

        <div>
            <div>
                <label for="resume">Résumé du livre :</label>
            </div>
            <div>
                <textarea name="resume" id="resume"></textarea>
            </div>
        </div>

        <div>
            <div>
                <label for="date">Date de parution :</label>
            </div>
            <div class="dateInput">
                <input type="text" id="date" name="dateDay" placeholder="JOUR">
                <input type="text" id="date" name="dateMonth" placeholder="MOIS">
                <input type="text" id="date" name="dateYear" placeholder="ANNÉE">
                <input type="hidden" id="dateHidden" value="" name="dateHidden">
            </div>
        </div>

        <div>
            <div>
                <label for="author">Auteur(s) du livre :</label>
            </div>

            <div class="authorSelected">
                <!------------>
            </div>
            <div>
                <div class="selectedAuthors">
                    
                </div>
                <div class="searchAuthors">
                    <input type="text" id="searchAuthor" placeholder="Rechercher auteur" autocomplete="off">
                </div>
                <div class="containAuthors">
                    @foreach ($authors as $author)
                        <button data-index={{$loop->index}} data-id={{$author->id}} data-name='{{$author->name}}'>{{$author->name}}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <div>
            <input type="submit" value="submit">
        </div>
    </form>
</main>

{{-- <script>
    let authors = {!! json_encode($authors) !!};
</script> --}}
<script src={{asset("js/book/create.js")}}></script>

@include("layout.endHTML")