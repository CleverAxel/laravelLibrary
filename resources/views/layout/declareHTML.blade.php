<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{asset('./css/basic/style.css')}}>
    
    @push("css")
        @foreach ($css as $style)
            <link rel="stylesheet" href={{asset($style)}}>
        @endforeach
    @endpush

    @stack("css")
    @if (isset($title))
        <title>{{$title}}</title>
    @else
        <title>Title missing</title>
    @endif
</head>
<body>