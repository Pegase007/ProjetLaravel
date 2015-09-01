@extends('layout')

@section('title')

    Category Update

@endsection
@section('contentheader')

    Category Update
@endsection

@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Category / </a><a href="#"> Update </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

                <div class="title">Category Update</div>



                <h3> L'id est {{$id}}</h3>


@endsection