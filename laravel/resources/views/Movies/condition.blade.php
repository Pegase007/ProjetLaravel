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


        <div class="table-success">
            <div class="table-header">

                <div>
                <div class="col-md-7 table-caption">
                    Movie Table
                </div>

                <div class=" btn-toolbar" role="toolbar">
                    <div class="btn-group">
                        <a href="{{route('movies.condition',['condition'=>'visible'])}}" type="button" class="btn btn-default">Visible</a>
                        <a href="{{route('movies.condition',['condition'=>'invisible'])}}" type="button" class="btn btn-default">Invisible</a>
                        <a href="{{route('movies.condition',['condition'=>'VO'])}}" type="button" class="btn btn-default">VO</a>
                        <a href="{{route('movies.condition',['condition'=>'VF'])}}" type="button" class="btn btn-default">VF</a>
                        <a href="{{route('movies.condition',['condition'=>'VOST'])}}" type="button" class="btn btn-default">VOST</a>
                        <a href="{{route('movies.condition',['condition'=>'VOSTFR'])}}" type="button" class="btn btn-default">VOSTFR</a>
                    </div>
                </div>
                </div>
                </div>

            <table class="table table-bordered">
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

                        <td>{{$movie->id}}</td>
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







@endsection