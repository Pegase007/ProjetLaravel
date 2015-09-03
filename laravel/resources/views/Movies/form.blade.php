@extends('layout')

@section('title')
    Formulaires
@endsection
@section('contentheader')
    Les Formulaires
@endsection

{{--Ecrire dans la session content--}}
@section('content')

    {{--Formulaire: action => destination ou tu envois les données--}}
    {{--method! méthode denvois des données  GET|POST  --}}
    <form action="" method="POST">

        <label for="nom">Nom</label> <input class="form-control" type="text" name="nom" id="nom">



        <label for="nom">Email</label> <input class="form-control" type="email" name="email" id="email">

        <label for="nom">Options</label>

        <select name="options">
            <option value="1">Un</option>
            <option value="2">Deux</option>
            <option value="3">Trois</option>
        </select>

        <input type="radio" name="sexe" value="1">Nana
        <input type="radio" name="sexe" value="2">Mex


        <input type="checkbox" name="movies[]" value="12">Scary Movie 2
        <input type="checkbox" name="movies[]" value="13">Scary Movie 3

        <button class="btn btn-primary" type="submit"><i class="fa fa-bitcoin"></i> Envoyer le formulaire</button>

    </form>


@endsection