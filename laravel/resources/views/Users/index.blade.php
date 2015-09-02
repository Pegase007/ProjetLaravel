@extends('layout')

@section('title')

    Users Index

@endsection
@section('contentheader')

    Users Index
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Users / </a><a href="#"> Index </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

        <div class="title">User Index</div>

        {{--<ul>--}}
            {{--<li><a href="{{ route('users.search',['zipcode'=> 69000, 'ville'=> 'Lyon','enabled'=>1]) }}"> Liste des movies fr visible 3h</a></li>--}}
            {{--<li><a href="{{ route('users.search',['zipcode'=> 69, 'ville'=> '*','enabled'=> '0']) }}"> Liste des movies en visible </a></li>--}}
            {{--<li><a href="{{ route('users.search',['zipcode'=> '*', 'ville'=> '*','enabled'=> 1]) }}"> Liste des movies visible 4h</a></li>--}}
        {{--</ul>--}}


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
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>   </th>
                    <th>   </th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $users)
                    <tr>

                        <td>{{$users->id}}</td>
                        <td class="col-md-1"><a href="{{route('users.read',['id'=>$users->id])}}" class="thumbnail"> <img class="img-responsive" src="{{$users->avatar}}" alt="{{$users->username}}" title="{{$users->username}}" ></a></td>
                        <td><a href="{{route('users.read',['id'=>$users->id])}}" >{{$users->username}}</a></td>
                        <td>{{$users->email}}</td>
                        <td><button class="btn btn-default" type="submit"><i class="fa fa-eye"></i> See</button></td>
                        <td><a href="{{route('users.delete',['id'=>$users->id])}}" class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i> Delete</button></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>


@endsection