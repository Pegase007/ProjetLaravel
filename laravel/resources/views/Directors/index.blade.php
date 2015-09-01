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
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Dob</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($directors as $director)
                            <tr>

                                <td>{{$director->id}}</td>
                                <td>{{$director->lastname}}</td>
                                <td>{{$director->firstname}}</td>
                                <td>{{$director->dob}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

@endsection