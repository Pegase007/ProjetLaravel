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



    <div class="col-md-6">

        <div id="budget" data-url="{{url('admin/api/budget-cat')}}" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    </div>

    <div class="col-md-6">

        <div id="comcine" data-url="{{url('admin/api/com-cine')}}" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    </div>





@endsection
@section('js')
    @parent

    {{--GRAPHS--}}
    <script src="http://code.highcharts.com/highcharts.js"></script>
    {{--PIE CHART--}}
    <script src="http://code.highcharts.com/highcharts-3d.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>

    <script src="http://code.highcharts.com/modules/data.js"></script>
    <script src="http://code.highcharts.com/modules/drilldown.js"></script>

    <script src="{{  asset('js/gmap.js') }}"></script>
    <script src="{{ asset('js/realtime.js') }}"> </script>
@endsection
