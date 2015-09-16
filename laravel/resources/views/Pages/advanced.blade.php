@extends('layout')

@section('title')

    LARAVEL5

@endsection
@section('contentheader')

    Advanced

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

    {{--START GOOGLE MAPS INVISIBLE DIV TO SEND INFORMATION TO gmap.js--}}
    <div id="maps" style="width:100%;height:350px;"></div>

    <div id="items" style="display: none" >

        @foreach($cinemas as $cinema)


            <li data-title="{{$cinema->title}}" data-id="{{$cinema->id}}" data-sceances=" {{  \App\Model\Sessions::where('cinema_id', '=', $cinema->id)->where('date_session', '>', new DateTime('now'))->count() }}">{{$cinema->ville}}</li>

            {{--<?php $var = "lala"; ?>--}}
            {{--{{ $var  }}--}}
            {{--            {{dump($cinema->sessions) }}--}}

            {{--            {{  \App\Model\Sessions::where('cinema_id', '=', $cinema->id)->where('date_session', '>', new DateTime('now'))->count() }}--}}
            {{--{{ dump(DB::table('sessions')->where('cinema_id', $cinema->id)->where('date_session','>=', new DateTime('now'))->count()) }}--}}
            {{----}}

        @endforeach

    </div>
    {{--END GOOGLE MAPS--}}


    {{--CINEMA REVIEWS --}}
    <div class="col-md-12"><br></div>
    <div class=" col-md-6 panel widget-threads">
        <div class="panel-heading">
            <span class="panel-title"><i class="panel-title-icon fa fa-comments-o"></i>Cinema Reviews</span>
        </div> <!-- / .panel-heading -->
        <div class="panel-body">

            @foreach($temoignages as $temoignage)
                <div class="thread">
                    {{--{{dump($temoignage->cinema)}}--}}
                    <img src="{{$temoignage->cinema->image}}" alt="" class="thread-avatar">
                    <div class="thread-body">
                        <span class="thread-time">{{$temoignage->date}}</span>
                        <a href="#" class="thread-title">{{$temoignage->accroche}}</a>
                        <p>{{$temoignage->contenu}}</p>
                        <div class="thread-info">Commenté par <a href="#" title="">{{$temoignage->cinema->title}}</a> sur <a href="#" title="">{{$temoignage->movies->title}}</a></div>
                    </div> <!-- / .thread-body -->
                </div> <!-- / .thread -->

            @endforeach


        </div> <!-- / .panel-body -->
    </div>
    {{--END MOVIES REVIEW--}}

    {{--START TASKS--}}

    <div  class="col-md-offset-1 col-md-5 panel widget-tasks">
        <div class="panel-heading">
            <span class="panel-title"><i class="panel-title-icon fa fa-tasks"></i>Tasks</span>
        </div> <!-- / .panel-heading -->

        <div class="panel-body" data-url="{{ route('position') }}" data-token="{{ csrf_token() }}">

        @foreach($tasks as $task)
            <div  class="task" id="taks_{{ $task->id  }}">


                @if(( $time=\App\Model\Tasks::select(DB::raw('TIMESTAMPDIFF(HOUR,NOW(), date) as date'))->where('id', '=', $task->id)->first()->date) < 24)

                    <span class="label label-danger pull-right">High</span>

                @elseif(( $time=\App\Model\Tasks::select(DB::raw('TIMESTAMPDIFF(HOUR,NOW(), date) as date'))->where('id', '=', $task->id)->first()->date)<72)

                    <span class="label label-warning pull-right">Medium</span>
                @else
                    <span class="label label-default pull-right">Low</span>
                @endif



                <div class="fa fa-arrows-v task-sort-icon"></div>
                <div class="action-checkbox">
                    <label class="px-single"><input type="checkbox" name="" value="" class="px"><span class="lbl"></span></label>
                </div>





                <a href="#" class="task-title">{{$task->content}}<span> Dans {{ \App\Model\Tasks::select(DB::raw('TIMESTAMPDIFF(HOUR,NOW(), date) as date'))->where('id', '=', $task->id)->first()->date}} heures
                    </span></a>
            </div> <!-- / .task -->
        @endforeach
        </div>

        {{--COMPLETED TASKS--}}
        <div class="panel-footer clearfix">
            <div class="pull-right">
                <button class="btn btn-xs" id="clear-completed-tasks"> Clear </button>
            </div>
        </div> <!-- / .panel-body -->

        {{--ADD TASK--}}
        <div class="col-md-12"><br></div>
        <form method="post" action="{{ route('nwtask') }}" class="row">
            {{csrf_field()}}
            <div class="col-md-12">
                <input name='content' id="content" type="text" placeholder="Add a task" class="form-control input-lg widget-profile-input">
            </div>
            <div class="col-md-12"><br></div>

            <div class="col-md-4">
                <input type="text" class="form-control date input-lg widget-profile-input" name="date" id="date" placeholder="due-date">
            </div>

            <div class="col-md-8">
                <select class="form-control input-lg widget-profile-input " name="movie">
                    @foreach($movies as $movie)
                        <option id="{{$movie->id}}" value="{{$movie->id}}">{{$movie->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12"> <br></div>
            <button type="submit" class="btn btn-primary btn-xs col-md-offset-1 col-md-10">Creer</button>

        </form>


        {{--END ADD TASK--}}

    </div> <!-- / .panel-body -->


    {{--END TASKS--}}
@endsection


@section('js')
    @parent
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="{{  asset('js/gmap.js') }}"></script>
    <script src="{{ asset('js/realtime.js') }}"> </script>

@endsection
