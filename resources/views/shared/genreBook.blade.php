@switch($genre)
    @case("ROMAN")
        <div style="background-color: #eb4034" class={{$className}}>{{$genre}}</div>
        @break
 
    @case("FANTASTIQUE")
        <div style="background-color: #b79903" class={{$className}}>{{$genre}}</div>
        @break
    
    @case("SCIENCE-FICTION")
        <div style="background-color: #188b25" class={{$className}}>{{$genre}}</div>
        @break
 
    @default
        <div style="background-color: #000000; color: #ffffff" class={{$className}}>{{$genre}}</div>
@endswitch