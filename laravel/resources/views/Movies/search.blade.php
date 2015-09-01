@extends('layout')

@section('title')

    Movies Search

@endsection
@section('contentheader')

    Movies Search
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Movies / </a><a href="#"> Search </a></li>
@endsection
{{--Ecrire dans la session content--}}
@section('content')

                <div class="title">Movie Search</div>




    {{$languages}}
    {{$visible}}
    {{$duree}}



@endsection