<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Actors Index</div>



        <h3> {{$title}} </h3>
        <ul>
            @foreach($noms as $nom)

                <li> {{ $nom }}</li>

            @endforeach


            @foreach($age as $ages)

                <li> {{ $ages }}</li>

            @endforeach

        </ul>

        <ul>
            @foreach($localite as $ville=>$acteurs)

                @if($ville == "Paris")
                    <li>{{$ville}}:</li>

                    <ul>
                        @foreach($acteurs as $act)

                            {{$act}},
                        @endforeach
                    </ul>
                @endif
            @endforeach
        </ul>
<p> {{$chaine or "Texte par défault"}}</p>

        <ul>
            @foreach($acteurs as $clef=>$valeur)


                <li>{{$valeur}}</li>


            @endforeach
        </ul>







    </div>
</div>
</body>
</html>
