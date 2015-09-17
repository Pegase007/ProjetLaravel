@extends('layout')

@section('title')

    LARAVEL5

@endsection
@section('contentheader')

    Simple

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


<div class="col-md-12"> <br></div>

    {{--<ul>--}}
        {{--['ville'=>"Lyon"] permet d'envoyer l'argument ->  ville en tant que paramettre dans mes vues--}}

        {{--<li> <a href="{{ route('actors.index',['ville'=>"Lyon"]) }}"> Liste des acteurs</a></li>--}}
        {{--<li><a href="{{ route('directors.index') }}"> Liste des directors</a></li>--}}
        {{--<li><a href="{{ route('movies.index') }}"> Liste des movies</a></li>--}}
    {{--</ul>--}}


    {{--<ul>--}}
        {{--<li><a href="{{ route('movies.search',['languages'=>"fr",'visible'=>'1','duree'=>'3']) }}"> Liste des movies fr visible 3h</a></li>--}}
        {{--<li><a href="{{ route('movies.search',['languages'=>"en",'visible'=>'0']) }}"> Liste des movies en visible </a></li>--}}
        {{--<li><a href="{{ route('movies.search',['languages'=>"fr",'visible'=>'1','duree'=>'4']) }}"> Liste des movies visible 4h</a></li>--}}
    {{--</ul>--}}

    {{--<ul>--}}
        {{--<li><a href="{{ route('users.search',['zipcode'=> 69000, 'ville'=> 'Lyon','enabled'=>1]) }}"> Liste des movies fr visible 3h</a></li>--}}
        {{--<li><a href="{{ route('users.search',['zipcode'=> 69, 'ville'=> '*','enabled'=> '0']) }}"> Liste des movies en visible </a></li>--}}
        {{--<li><a href="{{ route('users.search',['zipcode'=> '*', 'ville'=> '*','enabled'=> 1]) }}"> Liste des movies visible 4h</a></li>--}}
    {{--</ul>--}}


    {{--First dashboard--}}
<div class="col-md-6">
    <div class="stat-panel">
        <!-- Success background, bordered, without top and bottom borders, without left border, without padding, vertically and horizontally centered text, large text -->
        <a href="#" class="stat-cell col-xs-5 bg-success bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
            Moyenne d'age des acteurs <br> <strong>{{number_format($age->age, 0) }}</strong> ans
        </a> <!-- /.stat-cell -->
        <!-- Without padding, extra small text -->
        <div class="stat-cell col-xs-7 no-padding valign-middle">
            <!-- Add parent div.stat-rows if you want build nested rows -->
            <div class="stat-rows">
                <div class="stat-row">
                    <!-- Success background, small padding, vertically aligned text -->
                    <a href="#" class="stat-cell bg-success padding-sm valign-middle">
                        {{$lyon->lyon}} de Lyon
                        <i class="fa fa-building-o pull-right"></i>
                    </a>
                </div>
                <div class="stat-row">
                    <!-- Success darken background, small padding, vertically aligned text -->
                    <a href="#" class="stat-cell bg-success darken padding-sm valign-middle">
                        {{$paris->paris}} de Paris
                        <i class="fa fa-building pull-right"></i>
                    </a>
                </div>
                <div class="stat-row">
                    <!-- Success darker background, small padding, vertically aligned text -->
                    <a href="#" class="stat-cell bg-success darker padding-sm valign-middle">
                        {{$marseille->marseille}} de Marseille
                        <i class="fa fa-hospital-o pull-right"></i>
                    </a>
                </div>
            </div> <!-- /.stat-rows -->
        </div> <!-- /.stat-cell -->
    </div>
    {{--end first dashboard--}}

{{--second dashboard--}}
</div>
    <div class="col-md-6">
        <div class="stat-panel">
            <!-- Success background, bordered, without top and bottom borders, without left border, without padding, vertically and horizontally centered text, large text -->
            <a href="#" class="stat-cell col-xs-5 bg-success bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
                <strong>{{$comments->coms}}</strong> commentaires
            </a> <!-- /.stat-cell -->
            <!-- Without padding, extra small text -->
            <div class="stat-cell col-xs-7 no-padding valign-middle">
                <!-- Add parent div.stat-rows if you want build nested rows -->
                <div class="stat-rows">
                    <div class="stat-row">
                        <!-- Success background, small padding, vertically aligned text -->
                        <a href="#" class="stat-cell bg-success padding-sm valign-middle">
                            {{$actifs->actifs}} actifs
                            <i class="fa fa-check-square-o pull-right"></i>
                        </a>
                    </div>
                    <div class="stat-row">
                        <!-- Success darken background, small padding, vertically aligned text -->
                        <a href="#" class="stat-cell bg-success darken padding-sm valign-middle">
                            {{$val->val}} en cours de validation
                            <i class="fa fa-check-square pull-right"></i>
                        </a>
                    </div>
                    <div class="stat-row">
                        <!-- Success darker background, small padding, vertically aligned text -->
                        <a href="#" class="stat-cell bg-success darker padding-sm valign-middle">
                            {{$inactifs->inact}} inactifs
                            <i class="fa fa-square-o pull-right"></i>
                        </a>
                    </div>
                </div> <!-- /.stat-rows -->
            </div> <!-- /.stat-cell -->
        </div>
        </div>
{{--end second dashboard--}}



    {{--START PIECHARTS--}}
        <div class="row">
            <div class="col-xs-4">
                <!-- Centered text -->
                <div class="stat-panel text-center">
                    <div class="stat-row">
                        <!-- Dark gray background, small padding, extra small text, semibold text -->
                        <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                            <i class="fa fa-globe"></i>&nbsp;&nbsp;Taux de commentaires actifs
                        </div>
                    </div> <!-- /.stat-row -->
                    <div class="stat-row">
                        <!-- Bordered, without top border, without horizontal padding -->
                        <div class="stat-cell bordered no-border-t no-padding-hr">
                            <div class="pie-chart" data-percent="{{($actifs->actifs/$comments->coms)*100}}" id="easy-pie-chart-1">
                                <div class="pie-chart-label">{{number_format(($actifs->actifs/$comments->coms)*100,0)}}%</div>
                                </div>
                        </div>
                    </div> <!-- /.stat-row -->
                </div> <!-- /.stat-panel -->
            </div>


            <div class="col-xs-4">
                <div class="stat-panel text-center">
                    <div class="stat-row">
                        <!-- Dark gray background, small padding, extra small text, semibold text -->
                        <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                            <i class="fa fa-flash"></i>&nbsp;&nbsp;Taux de films favoris
                        </div>
                    </div> <!-- /.stat-row -->
                    <div class="stat-row">
                        <!-- Bordered, without top border, without horizontal padding -->
                        <div class="stat-cell bordered no-border-t no-padding-hr">
                            <div class="pie-chart" data-percent="{{($fav->fav/$ttfilms->movies)*100}}" id="easy-pie-chart-2">
                                <div class="pie-chart-label">{{number_format(($fav->fav/$ttfilms->movies)*100,0)}}%</div>
                                </div>
                        </div>
                    </div> <!-- /.stat-row -->
                </div> <!-- /.stat-panel -->
            </div>
            <div class="col-xs-4">
                <div class="stat-panel text-center">
                    <div class="stat-row">
                        <!-- Dark gray background, small padding, extra small text, semibold text -->
                        <div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
                            <i class="fa fa-cloud"></i>&nbsp;&nbsp;Taux films diffusés
                        </div>
                    </div> <!-- /.stat-row -->
                    <div class="stat-row">
                        <!-- Bordered, without top border, without horizontal padding -->
                        <div class="stat-cell bordered no-border-t no-padding-hr">
                            <div class="pie-chart" data-percent="{{($dif->dif/$ttfilms->movies)*100}}" id="easy-pie-chart-3">
                                <div class="pie-chart-label">{{number_format(($dif->dif/$ttfilms->movies)*100,0)}}%</div>
                                </div>
                        </div>
                    </div> <!-- /.stat-row -->
                </div> <!-- /.stat-panel -->
            </div>
        </div>
    {{--END PIE CHARTS--}}

{{--START MOVIE FORM--}}
    @if (count($errors) > 0)

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>
    @endif

<div class="col-md-6">
    <form action="{{ route('flashmovie') }}" method="post" class="panel form-horizontal">
        {{csrf_field()}}
        <div class="panel-heading">
            <span class="panel-title">Creer film flash</span>
        </div>
        <div class="panel-body">
            <div class="row form-group">
                <label class="col-md-2 control-label">Titre</label>
                <div class="col-md-10">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>


            <div class="form-group">
                <label  name="categories_id" class="col-sm-2 control-label">Categories</label>
                <div class="col-sm-10">
                    <select  class="js-example-tags" name="categories_id">

                        <option value=""> Select</option>

                    @foreach( $categories  as $category)

                            <option value="{{$category->id}}">{{$category->title}}</option>

                        @endforeach

                    </select>
                </div>
            </div>


            <div class="row form-group">
                <label class="col-md-2 control-label">Synopsis</label>
                <div class="col-md-10">
                    <input type="synopsis" name="synopsis" class="form-control">
                </div>
            </div>
        </div>
        <div class="panel-footer text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

    {{--end movie form--}}
{{--START DINAMIC PANEL--}}
    <div class="col-md-6" id="panelajax" data-url="{{ route('sessions.ajax') }}">
        <div class="panel panel-success widget-support-tickets" id=" dashboard-recent dashboard-support-tickets">
            <div class="panel-heading">
                <span class="panel-title"><i class="panel-title-icon fa fa-bullhorn"></i>Prochaines scéances</span>
                <div class="panel-heading-controls">
                    <div class="panel-heading-text"><a href="#">{{$tocome->coming}} scéances à venir</a></div>
                </div>
            </div> <!-- / .panel-heading -->
            <div   class="panel-body tab-content-padding">
                <!-- Panel padding, without vertical padding -->
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="panel-padding no-padding-vr" style="overflow: hidden; width: auto; height: 300px;">

                        @foreach($comingsoon as $movie)
                        <div class="ticket">


                            @if(($movie->dif) < 2)
                                 <span class="label label-danger ticket-label">Sortie dans {{$movie->dif}}</span>
                            @elseif(($movie->dif) < 6)
                                <span class="label label-warning ticket-label">Sortie dans {{$movie->dif}}</span>
                            @elseif(($movie->dif) < 15)
                                <span class="label label-info ticket-label">Sortie dans {{$movie->dif}}</span>
                            @elseif(($movie->dif) > 15)
                                <span class="label label-success ticket-label">Sortie dans {{$movie->dif}}</span>
                            @endif

                                <a href="#" title="" class="ticket-title">{{$movie->movies}}<span>[#{{$movie->id}}]</span></a>
								<span class="ticket-info">
									Diffusé à <a href="#" title="">{{$movie->cinema}}</a>
								</span>
                        </div> <!-- / .ticket -->

                        @endforeach
                    </div>
                </div>
            </div> <!-- / .panel-body -->
        </div> <!-- / .panel -->
    </div>

    {{--end dinamic panel--}}


<br>
@endsection
@section('js')
    @parent
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="{{  asset('js/gmap.js') }}"></script>
    <script src="{{ asset('js/realtime.js') }}"> </script>

@endsection
