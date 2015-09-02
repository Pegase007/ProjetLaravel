@extends('layout')

@section('title')

    Actors Read

@endsection
@section('contentheader')

    Actors Read
@endsection

@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Actors / </a><a href="#"> Read </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

                <div class="title">Actors Read</div>



                    <h3> L'id est {{$actors->id}}</h3>
                    {{$actors->firstname}}
                    {{$actors->lastname}}


@endsection