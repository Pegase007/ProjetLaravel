@extends('layout')

@section('title')

    Actors Index

@endsection
@section('contentheader')

    Actors Index
@endsection

@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Actors / </a><a href="#"> Index </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

        {{--<div class="title">Actors Index</div>--}}



        {{--<h3> {{$title}} </h3>--}}
        {{--<ul>--}}
            {{--@foreach($noms as $nom)--}}

                {{--<li> {{ $nom }}</li>--}}

            {{--@endforeach--}}


            {{--@foreach($age as $ages)--}}

                {{--<li> {{ $ages }}</li>--}}

            {{--@endforeach--}}

        {{--</ul>--}}

        {{--<ul>--}}
            {{--@foreach($localite as $ville=>$acteurs)--}}

                {{--@if($ville == "Paris")--}}
                    {{--<li>{{$ville}}:</li>--}}

                    {{--<ul>--}}
                        {{--@foreach($acteurs as $act)--}}

                            {{--{{$act}},--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--@endif--}}
            {{--@endforeach--}}
        {{--</ul>--}}
{{--<p> {{$chaine or "Texte par défault"}}</p>--}}

        {{--<ul>--}}
            {{--@foreach($acteurs as $clef=>$valeur)--}}


                {{--<li>{{$valeur}}</li>--}}


            {{--@endforeach--}}
        {{--</ul>--}}



        <div class="table-success">
            <div class="table-header">
                <div class="table-caption">
                    Success Table
                </div>
            </div>
            <table id="list" class="table table-bordered">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Image</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Dob</th>
                    <th>City</th>
                    <th>Nationality</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($actors as $actor)
                <tr>

                    <td>{{$actor->id}}</td>
                    <td class="col-md-1"><a href="{{route('actors.read',['id'=>$actor->id])}}" class="thumbnail"> <img class="img-responsive" src="{{$actor->image}}" alt="{{$actor->lastname}} {{$actor->firstname}}" title="{{$actor->lastname}} {{$actor->firstname}}" ></a></td>

                    <td><a href="{{route('actors.read',['id'=>$actor->id])}}" >{{$actor->lastname}}{{$actor->firstname}}</a></td>
                    <td > <a href="" data-url="{{route('actors.thumb')}}" class="like" data-token="{{csrf_token()}}" data-actor={{$actor->id}} > <i  class="col-md-offset-2 col-md-2 fa fa-thumbs-up"></i></a>
                        <span class="col-md-2"> 0 </span>
                        <a  href="" data-url="{{route('actors.thumb')}}" class="dislike" data-token="{{csrf_token()}}" data-actor={{$actor->id}}  > <i class="col-md-2 fa fa-thumbs-down"></i></a>
                        <span class="col-md-2">0</span>
                    </td>
                    {{--{{dump($session)}}--}}
                    <td>{{$actor->dob}}</td>
                    <td>{{$actor->city}}</td>
                    <td>{{$actor->nationality}}</td>
                    <td><button class="btn btn-default" type="submit"><i class="fa fa-eye"></i> See</button></td>
                    <td><a href="{{route('actors.delete',['id'=>$actor->id])}}" class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i> Delete</a></td>
                </tr>
                    @endforeach
                </tbody>
            </table>

        </div>





@endsection