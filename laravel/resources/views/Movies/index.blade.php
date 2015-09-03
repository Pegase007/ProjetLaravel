@extends('layout')

@section('title')

    Movies Index

@endsection
@section('contentheader')

    Movies Index
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Movies / </a><a href="#"> Index </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')




    {{--<div class="title">Movie Index</div>--}}

    <form action="" method="POST">
    <div class="table">
        <div class="table-header">

            <div>
                <div class="col-md-3 table-caption">
                    Movie Table
                </div>

                <div class=" btn-toolbar" role="toolbar">
                    <div class="btn-group">


                        {{--{{  Request::segment(3)  }}--}}


                        {{--@if (Request::path() == )--}}


                        <a href="{{route('movies.condition',['condition'=>'visible'])}}" type="button" class="btn @if(Request::segment(3) === 'visible') btn-success @else btn-default @endif btn-xs "><i class="fa fa-eye"></i> Visible</a>
                        <a href="{{route('movies.condition',['condition'=>'invisible'])}}" type="button" class="btn @if(Request::segment(3) === 'invisible') btn-success @else btn-default @endif btn-xs"><i class="fa fa-eye-slash"></i> Invisible</a>
                    </div>
                    <div class="btn-group">

                        <a href="{{route('movies.condition',['condition'=>'VO'])}}" type="button" class="btn @if(Request::segment(3) === 'VO') btn-success @else btn-default @endif btn-xs"><i class="fa fa-language"></i> VO</a>
                        <a href="{{route('movies.condition',['condition'=>'VF'])}}" type="button" class="btn @if(Request::segment(3) === 'VF') btn-success @else btn-default @endif btn-xs"><i class="fa fa-language"></i> VF</a>
                        <a href="{{route('movies.condition',['condition'=>'VOST'])}}" type="button" class="btn @if(Request::segment(3) === 'VOST') btn-success @else btn-default @endif btn-xs"><i class="fa fa-language"></i> VOST</a>
                        <a href="{{route('movies.condition',['condition'=>'VOSTFR'])}}" type="button" class="btn @if(Request::segment(3) === 'VOSTFR') btn-success @else btn-default @endif btn-xs"><i class="fa fa-language"></i> VOSTFR</a>
                    </div>
                    <div class="btn-group">

                        <a href="{{route('movies.condition',['condition'=>'WarnerBros'])}}" type="button" class="btn @if(Request::segment(3) === 'WarnerBros') btn-success @else btn-default @endif btn-xs"><i class="fa fa-video-camera"></i> Warner Bros</a>
                        <a href="{{route('movies.condition',['condition'=>'HBO'])}}" type="button" class="btn @if(Request::segment(3) === 'HBO') btn-success @else btn-default @endif btn-xs"><i class="fa fa-video-camera"></i> HBO</a>
                    </div>
                    <div class="btn-group">
                        <a href="{{route('movies.index')}}" type="button" class="btn @if(Request::segment(3) == '') btn-success @else btn-default @endif btn-xs">TOUS</a>

                    </div>

                        <div class="btn-group btn-group-xs">
                            <button type="button" class="btn">Actions</button>
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down"></i></button>
                            <ul class="dropdown-menu">
                                <li><a onclick="$(this).closest('form').submit() href="#">Supprimer</a></li>
                                <li><a onclick="$(this).closest('form').submit() href="#">Activer</a></li>
                                <li><a onclick="$(this).closest('form').submit() href="#">Desactiver</a></li>
                            </ul>
                        </div>

                </div>
            </div>
        </div>

        <table class="table table-success table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>Image</th>
                <th>Enable</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Languages</th>
                <th>Distributeur</th>
                <th>Bo</th>
                <th>Annee</th>
                {{--<th>Created at</th>--}}
                {{--<th>Updated at</th>--}}
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>

                    <td><label class="px-single"><input type="checkbox" name="movies[]" value="{{$movie->id}}" class="px"><span class="lbl"></span></label>  {{$movie->id}}</td>
                    <td class="col-md-1"><a href="{{route('movies.read',['id'=>$movie->id])}}" class="thumbnail"> <img class="img-responsive" src="{{$movie->image}}"></a></td>
                    <td>
                        {{--checks if movie is visible or not, uses check boxes to make changes--}}
                        @if($movie->visible==1)

                            <a href="{{route('movies.update',['id'=>$movie->id , 'action'=> "visible"] )}}"> <i class="fa fa-check-square-o"></i></a>

                        @else

                            <a href="{{route('movies.update',['id'=>$movie->id, 'action'=> "visible"] )}}"> <i class="fa fa-square-o"></i></a>

                        @endif


                    </td>
                    {{--checks if cover is on or off ads a full star if cover is on--}}
                    <td>
                        @if($movie->cover == 1)

                            <a href="{{route('movies.update',['id'=>$movie->id ,'action'=> 'cover'])}}"> <i class="fa fa-star"></i></a>

                        @else

                            <a href="{{route('movies.update',['id'=>$movie->id , 'action'=> 'cover'])}}"> <i class="fa fa-star-o"></i></a>

                        @endif


                    </td>


                    <td><a href="{{route('movies.read',['id'=>$movie->id])}}"> {{$movie->title}}</a></td>
                    <td>{{$movie->languages}}</td>
                    <td>{{$movie->distributeur}}</td>
                    <td>{{$movie->bo}}</td>
                    <td>{{$movie->annee}}</td>
                    {{--<td>{{$movie->created_at}}</td>--}}
                    {{--<td>{{$movie->updated_at}}</td>--}}
                    <td><button class="btn btn-default" type="submit"><i class="fa fa-eye"></i> See</button></td>
                    <td><a href="{{route('movies.delete',['id'=>$movie->id])}}" class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i> Delete</a></td>

                </tr>
            @endforeach

            </tbody>

        </table>

    </div>
    </form>






@endsection