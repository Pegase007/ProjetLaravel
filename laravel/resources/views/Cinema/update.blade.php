@extends('layout')

@section('title')

    Cinema Update

@endsection
@section('contentheader')

    Cinema Update
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Cinema / </a><a href="#"> Update </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

                <div class="title">Cinema Update</div>



                <h3> L'id est {{$id}}</h3>





@endsection