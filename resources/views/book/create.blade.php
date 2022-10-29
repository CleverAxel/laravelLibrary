@include("layout.declareHTML", [
        "title" => "Ajouter un livre",
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
                <label for="date">Date de parution (JOUR / MOIS / ANNÉE) :</label>
            </div>
            <div class="dateInput">

                <select name="dateDay" id="date">
                    @for ($i = 1; $i < 32; $i++)
                        <option>{{$i}}</option>
                    @endfor
                </select>
                /
                <select name="dateMonth" id="date">
                    @for ($i = 1; $i < 13; $i++)
                        <option>{{$i}}</option>
                    @endfor
                </select>
                /

                <input type="text" id="date" name="dateYear" placeholder="ANNÉE">
                <input type="hidden" id="dateHidden" value="" name="dateHidden">
            </div>
        </div>



        <div>
            <div>
                <label for="author">Auteur(s) du livre :</label>
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
            <div>
                <label for="genre">Genre(s) du livre :</label>
            </div>

            <div>
                <div class="selectedGenres">
                         
                </div>
                <div class="searchGenres">
                    <input type="text" id="searchGenre" placeholder="Rechercher genre" autocomplete="off">
                </div>
                <div class="containGenres">
                    @foreach ($genres as $genre)
                        <button data-index={{$loop->index}} data-id={{$genre->id}} data-name='{{$genre->name}}'>{{$genre->name}}</button>
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