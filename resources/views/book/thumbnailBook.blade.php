<article class="thumbnailBook">
    <div>

        <div class="containImageBook">
            <img class="imgBook" src={{asset("images/book/harrypotteralecoledesorciers.jpg")}} alt="">
        </div>

        <div class="informationBook">
            <h2 class="titleBook">{{$title}}</h2>

            <table class="tableDetails">
                <tr>
                    <th colspan="2">Détails du livre</th>
                </tr>
                <tr>
                    <td>Genres</td>
                    <td>
                        @if ($genres)
                            @foreach ($genres as $genre)
                                @if ($loop->last)
                                    {{$genre->name."."}}
                                @else
                                    {{$genre->name.","}}
                                @endif
                            @endforeach
                        @else
                            Aucun genre spécifié.
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Auteurs</td>
                    <td>
                        @if ($authors)
                            @foreach ($authors as $author)
                                @if ($loop->last)
                                    {{$author->name."."}}
                                @else
                                    {{$author->name.","}}
                                @endif
                            @endforeach
                        @else
                            Aucun auteur spécifié.
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Date de parution</td>
                    <td>
                        @if ($date)
                            {{$date}}
                        @else
                            Aucune date spécifiée.
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Edition</td>
                    <td>
                        @if ($edition)
                            {{$edition}}
                        @else
                            Aucune édition spécifiée.
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Collection</td>
                    <td>
                        @if ($collection)
                            {{$collection}}
                        @else
                            Aucune collection spécifiée.
                        @endif
                    </td>
                </tr>
              </table>
            
              <section class="resumeBook">
                <h2>Résumé</h2>
                @if ($resume)
                    <p>{{$resume}}</p>
                @else
                    <p>Aucun résumé spécifié.</p>
                @endif
                
              </section>
            
        </div>

    </div>
</article>