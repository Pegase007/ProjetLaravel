@extends('layout')

@section('title')

    Directors Read

@endsection
@section('contentheader')

    Directors Read
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Directors / </a><a href="#"> Read </a></li>
@endsection


{{--Ecrire dans la session content--}}
@section('content')

                {{--<div class="title">Directors Read</div>--}}




                <div >
                    <div class="panel-body">
                        <div class="col-md-4 col-sm-4 profile-widget-name">
                            <h4>{{$directors->firstname}} {{$directors->lastname}}</h4>
                            <div>
                                 <img class="img-responsive" src="{{$directors->image}}">

                            </div>
                            <h6>{{$directors->dob}}</h6>
                        </div>
                        <div class="col-lg-8 col-sm-8 follow-info">
                            <p>{{$directors->biography}}</p>
                            <p>{{$directors->email}}</p>

                        </div>
                        <div class="weather-category twt-category">

                        </div>
                    </div>
                    <footer class="profile-widget-foot">

                    </footer>
                </div>






@endsection