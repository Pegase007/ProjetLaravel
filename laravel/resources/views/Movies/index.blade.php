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
                <div class="table-caption">
                    Success Table
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Image</th>
                    <th>Enable</th>
                    <th>Title</th>
                    <th>Languages</th>
                    <th>Distributeur</th>
                    <th>Bo</th>
                    <th>Annee</th>
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
                            @if($movie->visible==1)

                                <a href="{{route('movies.update',['id'=>$movie->id])}}"> <i class="fa fa-check-square-o"></i></a>

                            @else

                               <a href="{{route('movies.update',['id'=>$movie->id])}}"> <i class="fa fa-square-o"></i></a>

                            @endif


                        </td>


                        <td><a href="{{route('movies.read',['id'=>$movie->id])}}"> {{$movie->title}}</a></td>
                        <td>{{$movie->languages}}</td>
                        <td>{{$movie->distributeur}}</td>
                        <td>{{$movie->bo}}</td>
                        <td>{{$movie->annee}}</td>
                        <td><button class="btn btn-default" type="submit"><i class="fa fa-eye"></i> See</button></td>
                        <td><a href="{{route('movies.delete',['id'=>$movie->id])}}" class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i> Delete</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>







@endsection