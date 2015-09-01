@extends('layout')

@section('title')

    Movies Read

@endsection
@section('contentheader')

    Movies Read
@endsection

@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Movies / </a><a href="#"> Read </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

                <div class="title">Movie Read</div>


                    <h3> L'id est {{$id}}</h3>

@endsection