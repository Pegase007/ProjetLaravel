@extends('layout')

@section('title')

    Movies Read

@endsection
@section('contentheader')

    Movies Read
@endsection

@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Movies / </a><a href="#"> Read </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')


    <div class="profile-full-name">
        <span class="text-semibold">{{$movies->title}}</span>
    </div>
    <div class="profile-row">
        <div class="left-col">
            <div class="profile-block">
                <div class="panel profile-photo">
                    <img src="{{$movies->image}}" alt="">
                </div><br>

            </div>

            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <span class="panel-title">Synopsis</span>
                </div>
                <div class="panel-body">
                    {{$movies->synopsis}}
                </div>
            </div>
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <span class="panel-title">Description</span>
                </div>
                <div class="panel-body">
                    {{$movies->description}}
                </div>
            </div>


            <div class="right-col">

                <hr class="profile-content-hr no-grid-gutter-h">

                <div class="profile-content">

                    <ul id="profile-tabs" class="nav nav-tabs"><li class="dropdown pull-right tabdrop hide"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bars"></i> <b class="caret"></b></a><ul class="dropdown-menu"></ul></li>
                        <li class="active">
                            <a href="#profile-tabs-board" data-toggle="tab">Comments</a>
                        </li>
                        <li>
                            <a href="#profile-tabs-activity" data-toggle="tab">Informations</a>
                        </li>
                        <li>
                            <a href="#profile-tabs-followers" data-toggle="tab">Actors/directors</a>
                        </li>

                    </ul>

                    <div class="tab-content tab-content-bordered panel-padding">
                        <div class="widget-article-comments tab-pane panel no-padding no-border fade in active" id="profile-tabs-board">

                            <div class="comment">

                                <div class="comment-body">
                                    <form action="{{route('movies.comment',['id' => $movies->id])}}" method="post" id="addcomment" class="comment-text no-padding no-border expanding-input">
                                    {{csrf_field()}}
                                        <textarea name="content" class="form-control expanding-input-target" rows="1" placeholder="Add Comment"></textarea>
                                        <br>
                                        <button class="btn btn-primary btn-md pull-right btn-xs" type="submit"> Send</button>
                                        <br>
                                        <br>

                                    </form>
                                </div> <!-- / .comment-body -->
                            </div>

                            <div id="comment">
                                    @foreach($movies->comments as $comment)
                                        <div  class="comment">
                                            <img src="{{$comment->user->avatar}}" alt="" class="comment-avatar">
                                            <div class="comment-body">
                                                <div class="comment-text">
                                                    <div class="comment-heading">
                                                        <a href="#" title="">{{$comment->user->username}}</a><span>{{$comment->date_created}}</span>
                                                    </div>
                                                    {{$comment->content}}
                                                </div>
                                            </div> <!-- / .comment-body -->
                                        </div>
                                    @endforeach
                                </div> <!-- / .comment -->

                            <!-- / .comment -->

                    </div> <!-- / .tab-pane -->


                        {{--@foreach($movies->actors as $actor)--}}
                        {{--<div class="tab-pane fade widget-followers" id="profile-tabs-followers">--}}
                            {{--<div class="follower">--}}
                                {{--<img src="{{$actor->image}}" alt="" class="follower-avatar">--}}
                                {{--<div class="body">--}}
                                    {{--<div class="follower-controls">--}}
                                        {{--<a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i><span>&nbsp;&nbsp;Following</span></a>--}}
                                    {{--</div>--}}
                                    {{--<a href="#" class="follower-name">{{$actor->firstname}} {{$actor->lastname}}</a><br>--}}
                                    {{--<a href="#" class="follower-username">@jdoe</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                        </div> <!-- / .tab-pane -->
                        <div class="tab-pane fade widget-followers" id="profile-tabs-following">
                            <div class="follower">
                                <img src="assets/demo/avatars/1.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i><span>&nbsp;&nbsp;Following</span></a>
                                    </div>
                                    <a href="#" class="follower-name">John Doe</a><br>
                                    <a href="#" class="follower-username">@jdoe</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/3.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-outline">Follow</a>
                                    </div>
                                    <a href="#" class="follower-name">Michelle Bortz</a><br>
                                    <a href="#" class="follower-username">@mbortz</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/4.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-outline">Follow</a>
                                    </div>
                                    <a href="#" class="follower-name">Timothy Owens</a><br>
                                    <a href="#" class="follower-username">@towens</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/5.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-outline">Follow</a>
                                    </div>
                                    <a href="#" class="follower-name">Denise Steiner</a><br>
                                    <a href="#" class="follower-username">@dsteiner</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/1.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i><span>&nbsp;&nbsp;Following</span></a>
                                    </div>
                                    <a href="#" class="follower-name">John Doe</a><br>
                                    <a href="#" class="follower-username">@jdoe</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/3.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-outline">Follow</a>
                                    </div>
                                    <a href="#" class="follower-name">Michelle Bortz</a><br>
                                    <a href="#" class="follower-username">@mbortz</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/4.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-outline">Follow</a>
                                    </div>
                                    <a href="#" class="follower-name">Timothy Owens</a><br>
                                    <a href="#" class="follower-username">@towens</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/5.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-outline">Follow</a>
                                    </div>
                                    <a href="#" class="follower-name">Denise Steiner</a><br>
                                    <a href="#" class="follower-username">@dsteiner</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/1.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i><span>&nbsp;&nbsp;Following</span></a>
                                    </div>
                                    <a href="#" class="follower-name">John Doe</a><br>
                                    <a href="#" class="follower-username">@jdoe</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/3.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-outline">Follow</a>
                                    </div>
                                    <a href="#" class="follower-name">Michelle Bortz</a><br>
                                    <a href="#" class="follower-username">@mbortz</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/4.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-outline">Follow</a>
                                    </div>
                                    <a href="#" class="follower-name">Timothy Owens</a><br>
                                    <a href="#" class="follower-username">@towens</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/5.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-outline">Follow</a>
                                    </div>
                                    <a href="#" class="follower-name">Denise Steiner</a><br>
                                    <a href="#" class="follower-username">@dsteiner</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/1.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i><span>&nbsp;&nbsp;Following</span></a>
                                    </div>
                                    <a href="#" class="follower-name">John Doe</a><br>
                                    <a href="#" class="follower-username">@jdoe</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/3.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-outline">Follow</a>
                                    </div>
                                    <a href="#" class="follower-name">Michelle Bortz</a><br>
                                    <a href="#" class="follower-username">@mbortz</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/4.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-outline">Follow</a>
                                    </div>
                                    <a href="#" class="follower-name">Timothy Owens</a><br>
                                    <a href="#" class="follower-username">@towens</a>
                                </div>
                            </div>

                            <div class="follower">
                                <img src="assets/demo/avatars/5.jpg" alt="" class="follower-avatar">
                                <div class="body">
                                    <div class="follower-controls">
                                        <a href="#" class="btn btn-sm btn-outline">Follow</a>
                                    </div>
                                    <a href="#" class="follower-name">Denise Steiner</a><br>
                                    <a href="#" class="follower-username">@dsteiner</a>
                                </div>
                            </div>
                        </div> <!-- / .tab-pane -->
                    </div> <!-- / .tab-content -->
                </div>
            </div>
        </div>


    </div>

    {{--<h3> L'id est {{$movies->id}}</h3>--}}









@endsection