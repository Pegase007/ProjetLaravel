@extends('layout')

@section('title')

    Users Index

@endsection
@section('contentheader')

    Users Index
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Users / </a><a href="#"> Index </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

        <div class="title">User Index</div>

        <ul>
            <li><a href="{{ route('users.search',['zipcode'=> 69000, 'ville'=> 'Lyon','enabled'=>1]) }}"> Liste des movies fr visible 3h</a></li>
            <li><a href="{{ route('users.search',['zipcode'=> 69, 'ville'=> '*','enabled'=> '0']) }}"> Liste des movies en visible </a></li>
            <li><a href="{{ route('users.search',['zipcode'=> '*', 'ville'=> '*','enabled'=> 1]) }}"> Liste des movies visible 4h</a></li>
        </ul>



@endsection