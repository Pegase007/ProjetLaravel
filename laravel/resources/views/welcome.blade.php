@extends('layout')

@section('title')

    LARAVEL5

@endsection
@section('contentheader')

    Welcome
@endsection

{{--Ecrire dans la session content--}}
@section('content')


    <ul>
        {{--['ville'=>"Lyon"] permet d'envoyer l'argument ->  ville en tant que paramettre dans mes vues--}}

        <li> <a href="{{ route('actors.index',['ville'=>"Lyon"]) }}"> Liste des acteurs</a></li>
        <li><a href="{{ route('directors.index') }}"> Liste des directors</a></li>
        <li><a href="{{ route('movies.index') }}"> Liste des movies</a></li>
    </ul>


    <ul>
        <li><a href="{{ route('movies.search',['languages'=>"fr",'visible'=>'1','duree'=>'3']) }}"> Liste des movies fr visible 3h</a></li>
        <li><a href="{{ route('movies.search',['languages'=>"en",'visible'=>'0']) }}"> Liste des movies en visible </a></li>
        <li><a href="{{ route('movies.search',['languages'=>"fr",'visible'=>'1','duree'=>'4']) }}"> Liste des movies visible 4h</a></li>
    </ul>

    <ul>
        <li><a href="{{ route('users.search',['zipcode'=> 69000, 'ville'=> 'Lyon','enabled'=>1]) }}"> Liste des movies fr visible 3h</a></li>
        <li><a href="{{ route('users.search',['zipcode'=> 69, 'ville'=> '*','enabled'=> '0']) }}"> Liste des movies en visible </a></li>
        <li><a href="{{ route('users.search',['zipcode'=> '*', 'ville'=> '*','enabled'=> 1]) }}"> Liste des movies visible 4h</a></li>
    </ul>

@endsection
