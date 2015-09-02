@extends('layout')

@section('title')

    Category Index

@endsection
@section('contentheader')

    Category Index
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Category / </a><a href="#"> Index </a></li>
@endsection
{{--Ecrire dans la session content--}}
@section('content')

        <div class="title">Category Index</div>



        <div class="table-success">
            <div class="table-header">
                <div class="table-caption">
                    Success Table
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>   </th>
                    <th>   </th>

                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>

                        <td>{{$category->id}}</td>
                        <td class="col-md-1"><a href="{{route('category.read',['id'=>$category->id])}}" class="thumbnail"> <img class="img-responsive" src="{{$category->image}}"></a></td>
                        <td><a href="{{route('category.read',['id'=>$category->id])}}">{{$category->title}}</a></td>
                        <td><button class="btn btn-default" type="submit"><i class="fa fa-eye"></i> See</button></td>
                        <td><a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i> Delete</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>




@endsection