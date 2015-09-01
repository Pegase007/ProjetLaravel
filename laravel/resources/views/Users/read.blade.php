@extends('layout')

@section('title')

    Users Read

@endsection
@section('contentheader')

    Users Read
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Users / </a><a href="#"> Read </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

                <div class="title">User Read</div>


                    <h3> L'id est {{$id}}</h3>


@endsection