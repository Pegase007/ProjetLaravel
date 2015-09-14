@extends('layout')

@section('title')

   Comments

@endsection
@section('contentheader')

    Comments
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Comments  </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')



    <div class="col-md-12">
        <div class="panel panel-dark panel-light-green">
            <div class="panel-heading">
                <span class="panel-title"><i class="fa fa-commenting-o"></i> Comments </span> <br>
                <span>La moyenne est de {{round($average,2)}} et la personne qui as le plus commenté est:  <i>{{$maxcom->username}}</i>  [{{$maxcom->nb}} commentaires]</span>
                <div class="panel-heading-controls">
                    <ul class="pagination pagination-xs">
                        <li><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul> <!-- / .pagination -->
                </div> <!-- / .panel-heading-controls -->
            </div> <!-- / .panel-heading -->
            <table id="list" class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>User</th>
                    <th>Movie</th>
                    <th>Note</th>
                    <th>Content</th>
                    <th>State</th>
                    <th>Supprimer</th>
                </tr>
                </thead>
                <tbody class="valign-middle">
                @foreach($comments as $comment)
                <tr>

                    <td><label class="px-single"><input type="checkbox" name="comments[]" value="{{$comment->id}}" class="px"><span class="lbl"></span></label> {{$comment->id}}</td>
                    <td>
                       {{$comment->user->username}}
                    </td>
                    <td><a href="" title="">{{$comment->movies->title}}</a></td>
                    <td>{{$comment->note}}</td>
                    <td>{{$comment->content}}</td>
                    <td>{{$comment->state}}</td>
                    <td><a href="{{route('comments.delete',['id'=>$comment->id])}}" class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i> Delete</a></td>
                </tr>
@endforeach
                </tbody>
            </table>
        </div> <!-- / .panel -->
    </div>







@endsection