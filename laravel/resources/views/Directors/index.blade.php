@extends('layout')

@section('title')

    Directors Index

@endsection
@section('contentheader')

    Directors Index
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Directors / </a><a href="#"> Index </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

                <div class="title">Directors Index</div>

                <div class="table-success">
                    <div class="table-header">
                        <div class="table-caption">
                            Success Table
                        </div>
                    </div>
                    <table id="list" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Dob</th>
                            <th>   </th>
                            <th>   </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($directors as $director)
                            <tr>

                                <td>{{$director->id}}</td>
                                <td class="col-md-1"><a href="{{route('directors.read',['id'=> $director->id ])}}" class="thumbnail"> <img class="img-responsive" src="{{$director->image}}"></a></td>
                                <td><a href="{{route('directors.read',['id'=> $director->id ])}}"> {{$director->lastname}}</a></td>
                                <td><a href="{{route('directors.read',['id'=> $director->id ])}}"> {{$director->firstname}}</a></td>
                                <td>{{$director->dob}}</td>
                                <td><button class="btn btn-default" type="submit"><i class="fa fa-eye"></i> See</button></td>
                                <td><a href="{{route('directors.delete',['id'=>$director->id])}}" class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i> Delete</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

@endsection