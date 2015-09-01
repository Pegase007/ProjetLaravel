@extends('layout')

@section('title')

    Actors Update

@endsection
@section('contentheader')

    Actors Update
@endsection

@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Actors / </a><a href="#"> Update </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

                <div class="title">Actors Update</div>



                <h3> L'id est {{$id}}</h3>


@endsection