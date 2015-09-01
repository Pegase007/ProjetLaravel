@extends('layout')

@section('title')

    Users Update

@endsection
@section('contentheader')

    Users Update
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Users / </a><a href="#"> Update </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')
                <div class="title">User Update</div>



                <h3> L'id est {{$id}}</h3>




@endsection