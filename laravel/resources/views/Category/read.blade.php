@extends('layout')

@section('title')

    Category Read

@endsection
@section('contentheader')

    Category Read
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Category / </a><a href="#"> Read </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

                <div class="title">Category Read</div>


                    <h3> L'id est {{$id}}</h3>



@endsection