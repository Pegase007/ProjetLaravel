@extends('layout')

@section('title')

    Cinema Read

@endsection
@section('contentheader')

    Cinema Read
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Cinema / </a><a href="#"> Read </a></li>
@endsection
{{--Ecrire dans la session content--}}
@section('content')

                <div class="title">Cinema Read</div>


                    <h3> L'id est {{$id}}</h3>


@endsection