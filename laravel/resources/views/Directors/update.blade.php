@extends('layout')

@section('title')

    Directors Update

@endsection
@section('contentheader')

    Directors Update
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Directors / </a><a href="#"> Update </a></li>
@endsection


{{--Ecrire dans la session content--}}
@section('content')
                <div class="title">Directors Update</div>


                <h3> L'id est {{$id}}</h3>



@endsection