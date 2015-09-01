@extends('layout')

@section('title')

    Movies Update

@endsection
@section('contentheader')

    Movies Update
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Movies / </a><a href="#"> Update </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')
                <div class="title">Movie Update</div>



                <h3> L'id est {{$id}}</h3>





@endsection