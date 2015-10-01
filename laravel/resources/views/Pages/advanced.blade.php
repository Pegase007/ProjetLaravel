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
    <div class="col-md-6">
        <div class=" panel widget-threads ">
            <div class="panel-heading">
                <span class="panel-title"><i class="panel-title-icon fa fa-comments-o"></i>Cinema Reviews</span>
            </div> <!-- / .panel-heading -->
            <div class="panel-body cinema-review" data-url="{{ route('sessions.review') }}">

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
        {{--START USERS--}}
        <div class="panel panel-dark panel-light-green">
            <div class="panel-heading">
                <span class="panel-title"><i class="panel-title-icon fa fa-smile-o"></i>New users</span>

            </div> <!-- / .panel-heading -->
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="users" data-url="{{route('sessions.users')}}" class="valign-middle">

                @foreach($users as $user)
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="{{$user->avatar}}" alt="" style="width:26px;height:26px;" class="rounded">&nbsp;&nbsp;<a href="#" title="">{{$user->username}}</a>
                        </td>
                        <td>{{$user->email}}</td>
                        <td></td>
                    </tr>
                @endforeach






                </tbody>
            </table>
        </div> <!-- / .panel -->
    </div>
    {{--END OF USERS--}}

    {{--START TASKS--}}

    <div data-url="{{ route('sessions.tasks') }}" class="col-md-offset-1 col-md-5 panel widget-tasks">

        <div class="panel-heading" >
            <span class="panel-title"><i class="panel-title-icon fa fa-tasks"></i>Tasks</span>
        </div> <!-- / .panel-heading -->
        <form method="get" action="{{ route('clear') }}" id="clear" class="row">
            {{csrf_field()}}
            <div class="panel-body" data-url="{{ route('position') }}" data-token="{{ csrf_token() }}">

                @foreach($tasks as $task)
                    <div  class="task @if($task->state==1) completed @endif " id="taks_{{ $task->id  }}">


                        @if(( $time=\App\Model\Tasks::select(DB::raw('TIMESTAMPDIFF(HOUR,NOW(), date) as date'))->where('id', '=', $task->id)->first()->date) < 24)

                            <span class="label label-danger pull-right">High</span>

                        @elseif(( $time=\App\Model\Tasks::select(DB::raw('TIMESTAMPDIFF(HOUR,NOW(), date) as date'))->where('id', '=', $task->id)->first()->date)<72)

                            <span class="label label-warning pull-right">Medium</span>
                        @else
                            <span class="label label-default pull-right">Low</span>
                        @endif



                        <div class="fa fa-arrows-v task-sort-icon"></div>
                        <div class="action-checkbox">
                            <label class="px-single">
                                <input class="px" data-url="{{route('state',['id'=> $task->id])}}" type="checkbox" name="task[]" value="{{$task->id}}" @if($task->state ==1)checked @endif><span class="lbl"></span></label>
                        </div>



                        <a href="#" class="task-title">{{$task->content}}<span>
                         {{  \Carbon\Carbon::createFromTimeStamp(strtotime($task->date))->diffForHumans() }}
                    </span></a>
                    </div> <!-- / .task -->
                @endforeach
            </div>


            {{--COMPLETED TASKS--}}
            <div class="panel-footer clearfix">
                <div class="pull-right">
                    <button type="submit" class="btn btn-xs" > Clear </button>
                </div>
            </div> <!-- / .panel-body -->
        </form>

        {{--ADD TASK--}}
        <div class="col-md-12"><br></div>
        <form method="post" id="taskform" action="{{ route('nwtask') }}" class="row">
            {{csrf_field()}}
            <div class="col-md-12">
                <input name='content' id="content" type="text" placeholder="Add a task" class="form-control input-lg widget-profile-input">
            </div>
            <div class="col-md-12"><br></div>

            <div class="col-md-12">
                <div class="form-control input-lg widget-profile-input" id="datetimepicker1" >
                    <input name="date" style="border: none" data-format="MM/dd/yyyy HH:mm:ss PP" type="text"></input>
                <span class="add-on">
                  <i class="fa fa-calendar pull-right"></i>
                </span>
                </div>
            </div>
            <div class="col-md-12"><br></div>
            <div class="col-md-12">
                <select class="form-control input-lg widget-profile-input " name="movie">
                    @foreach($movies as $movie)
                        <option id="{{$movie->id}}" value="{{$movie->id}}">{{$movie->title}}</option>
                    @endforeach
                </select>
            </div>

            <input name="administrator_id" style="border: none; display: none"  type="text" value="{{Auth::user()->id}}"></input>

            <div class="col-md-12"> <br></div>
            <button type="submit" class="btn btn-primary btn-xs col-md-offset-1 col-md-10">Creer</button>

        </form>


        {{--END ADD TASK--}}

    </div> <!-- / .panel-body -->


    {{--END TASKS--}}
<div class="col-md-12"></div>
    {{--API twitter--}}
    <div class="panel-body col-md-6">

      <div class="panel widget-messages-alt">
        <div class="panel-heading">
            <span class="panel-title"><i class="panel-title-icon fa fa-envelope"></i>Page perso de twitter</span>
        </div> <!-- / .panel-heading -->
        <div class="panel-body padding-sm">
            <div class="messages-list">
                @foreach($mentions as $mention)
                <div class="message">
                    <img src="{{$mention->user->profile_image_url}}" alt="" class="message-avatar">
                    <p class="message-subject"> {!!  Twitter::linkify($mention->text) !!}</p>
                    {{--@foreach($mention->entities->hashtags as $tag)--}}
                       {{--<br> <a href="">#{{$tag->text}}</a>--}}
                    {{--@endforeach--}}
                    <div class="message-description">
                        from <a href="#">{!! $mention->source !!} </a>
                        &nbsp;&nbsp;·&nbsp;&nbsp;
                        {{Twitter::ago($mention->created_at)}}
                    </div> <!-- / .message-description -->

                    <div class="message-description">
                        commenté par <a href="{{Twitter::linkUser($mention->user->name)}}" title="">{{$mention->user->name}}</a>
                        &nbsp;&nbsp;·&nbsp;&nbsp;

                    </div> <!-- / .message-description -->

                </div> <!-- / .message -->
           @endforeach

            </div> <!-- / .messages-list -->

        </div> <!-- / .panel-body -->
    </div>
        </div>

{{--END FIRST API--}}





    <div class="panel widget-messages-alt col-md-6">
        <div class="panel-heading">
            <span class="panel-title"><i class="panel-title-icon fa fa-envelope"></i>Twits d'allociné</span>
        </div> <!-- / .panel-heading -->
        <div class="panel-body padding-sm">
            <div class="messages-list">


                @foreach($twits as $twit)
                    <div class="message">
                        <img src="{{ $twit->user->profile_image_url }}" alt="" class="message-avatar">
                        <a href="#" class="message-subject">{{ $twit->user->name }}</a>
                        <p class="col-md-offset-2">{!!  Twitter::linkify($twit->text) !!}</p>
                        <div class="message-description">

                            {{Twitter::ago($mention->created_at)}}
                        </div> <!-- / .message-description -->
                    </div> <!-- / .message -->
                 @endforeach

            </div> <!-- / .messages-list -->

        </div> <!-- / .panel-body -->
    </div>

    {{--{{ dump($favtwit) }}--}}
    <div class="panel widget-messages-alt col-md-6">
        <div class="panel-heading">
            <span class="panel-title"><i class="panel-title-icon fa fa-envelope"></i>Twits fav</span>
        </div> <!-- / .panel-heading -->
        <div class="panel-body padding-sm">
            <div class="messages-list">


                @foreach($favtwit as $twit)
                    <div class="message">

                        <p >{!!  Twitter::linkify($twit->text) !!}</p>
                        <div class="message-description">
                            écrit par <a href="{{Twitter::linkUser($twit->user->name)}}" title="">{{$twit->user->name}}</a>
                            {{Twitter::ago($mention->created_at)}}
                        </div> <!-- / .message-description -->
                    </div> <!-- / .message -->
                @endforeach


            </div> <!-- / .messages-list -->

          </div> <!-- / .panel-body -->
    </div>



{{--Graph--}}

    <div class="col-md-7">

        <div id="actorsgraph" data-marseille="{{$marseille->count()}}" data-lyon="{{$lyon->count()}}" data-newyork="{{$newyork->count()}}" data-hampshire="{{$hampshire->count()}}" style="height: 350px;">


        </div>


    </div>


    <div class="col-md-5">

        <div id="actorsage" data-one="{{$one->count()}}" data-two="{{$two->count()}}" data-three="{{$three->count()}}" data-four="{{$four->count()}}" data-five="{{$five->count()}}" style=" height: 350px;">


        </div>


    </div>



    <div class="col-md-12">



        <div id="bestdirectors" class="graph">

            @for($i=1990; $i<=2015; $i++)
                <bestdir data-year="$i">

                    @foreach($bestdirector as $bestdir)





                        {{--<div style="display: none" data-dir="{{$bestdir->firstname}} {{$bestdir->lastname}}"--}}
                        {{--data-count="{{\App\Model\Directors_Movies::join('movies','movies.id','=','directors_movies.movies_id')->where('directors_id','=',$bestdir->id)->where(DB::raw('YEAR( movies.date_release)'),'=',$i)}}">--}}

                        {{--</div>--}}

                        {{--{{$tabdir = collect([])}};--}}

                        {{--{{$tabdir->put("$bestdir->firstname $bestdir->lastname",\App\Model\Directors_Movies::join('movies','movies.id','=','directors_movies.movies_id')->where('directors_id','=',$bestdir->id)->where(DB::raw('YEAR( movies.date_release)'),'=',$i ) }};--}}

                        {{--{{$tabdir->all()}};--}}

                        {{--{{$bestdir->firstname}} {{$bestdir->lastname}}/{{\App\Model\Directors_Movies::join('movies','movies.id','=','directors_movies.movies_id')->where('directors_id','=',$bestdir->id)->where(DB::raw('YEAR( movies.date_release)'),'=',$i}}--}}



                    @endforeach
                </bestdir>

            @endfor


        </div>



        <div class="graph-container">
            <div data-url="{{url('admin/api/best-directors')}}" id="hero-area" ></div>
        </div>

    </div>










@endsection


@section('js')
    @parent
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    {{--GRAPHS--}}
    <script src="http://code.highcharts.com/highcharts.js"></script>
    {{--PIE CHART--}}
    <script src="http://code.highcharts.com/highcharts-3d.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>


    <script src="{{  asset('js/gmap.js') }}"></script>
    <script src="{{ asset('js/realtime.js') }}"> </script>

@endsection
