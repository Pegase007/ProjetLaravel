@extends('layout')

@section('title')

    LARAVEL5

@endsection
@section('contentheader')

    Professionel

@endsection

{{--Ecrire dans la session content--}}
@section('content')
    <div class="col-md-12">

        <div class="pull-right col-xs-12 col-sm-auto">
            <a href="{{route('pro')}}" class="btn @if(Route::current()->getName() == 'pro') btn-success @else btn-default @endif  btn-labeled" style="width: 100%;">
                Professionel
            </a>
        </div>
        <div class="pull-right col-xs-12 col-sm-auto">
            <a href="{{route('advanced')}}" class="btn @if(Route::current()->getName() == 'advanced') btn-success @else btn-default @endif btn-labeled" style="width: 100%;">
                Avancé
            </a>
        </div>

        <div class="pull-right col-xs-12 col-sm-auto">
            <a href="{{route('home')}}" class="btn @if(Route::current()->getName() == 'home') btn-success @else btn-default @endif btn-labeled" style="width: 100%;">
                Simple
            </a>
        </div>

    </div>
    <div class="col-md-12"><br></div>




@endsection
@section('js')
    @parent
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="{{  asset('js/gmap.js') }}"></script>
    <script src="{{ asset('js/realtime.js') }}"> </script>
@endsection
