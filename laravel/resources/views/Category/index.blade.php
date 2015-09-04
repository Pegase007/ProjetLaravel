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


    <div class="col-md-12">
        <div class="col-md-6">
            <div class="stat-rows">
                <div class="stat-row">
                    <!-- Success background, small padding, vertically aligned text -->
                    <a href="#" class="stat-cell bg-danger padding-sm valign-middle">
                         Categories sans films
                    </a>
                </div>
                <div class="stat-row">
                    <!-- Success darken background, small padding, vertically aligned text -->
                    <a href="#" class="stat-cell bg-info darken padding-sm valign-middle">
                        Categorie la plus populaire

                    </a>
                </div>
                <div class="stat-row">
                    <!-- Success darker background, small padding, vertically aligned text -->
                    <a href="#" class="stat-cell bg-warning darker padding-sm valign-middle">
                        Categorie avec le plus gros budget de l'anné

                    </a>
                </div>
            </div>

            <br>
            <br>
            <br>
        </div>
        <div class="col-md-6">
            <div class="stat-panel">
                <div class="stat-row col-md-12">
                    <!-- Success darker background -->
                    <div class="stat-cell bg-success darker col-md-12">
                        <div class=" col-md-3">
                            <span><a href="{{route('category.read',['id'=>$random->id])}}" class="thumbnail"> <img class="img-responsive" src="{{$random->image}}"></a></span><br>
                        </div>

                        <div class="col-md-8 text-center">
                            <span class="text-bg"><strong>{{$random->title}}</strong></span><br>
                            <span class="text-bg">{{$random->description}}</span><br>

                        </div>
                    </div>
                </div> <!-- /.stat-row -->
                <div class="stat-row">
                    <!-- Success background, without bottom border, without padding, horizontally centered text -->
                    <div class="stat-counters bg-success no-border-b no-padding text-center">
                        <!-- Small padding, without horizontal padding -->
                        <div class="stat-cell col-md-4 padding-sm no-padding-hr">
                            <!-- Big text -->
                            <span class="text-bg"><strong></strong></span><br>
                            <!-- Extra small text -->
                            <span class="text-xs">FILMS</span>
                        </div>
                        <!-- Small padding, without horizontal padding -->
                        <div class="stat-cell col-md-4 padding-sm no-padding-hr">
                            <!-- Big text -->
                            <span class="text-bg"><strong>17</strong></span><br>
                            <!-- Extra small text -->
                            <span class="text-xs">COMMENTAIRES</span>
                        </div>
                        <!-- Small padding, without horizontal padding -->
                        <div class="stat-cell col-md-4 padding-sm no-padding-hr">
                            <!-- Big text -->
                            <span class="text-bg"><strong>49</strong></span><br>
                            <!-- Extra small text -->
                            <span class="text-xs">ACTEURS</span>
                        </div>
                    </div> <!-- /.stat-counters -->
                </div> <!-- /.stat-row -->
                <div class="stat-row">
                    <!-- Success background, without bottom border, without padding, horizontally centered text -->

                </div> <!-- /.stat-row -->
            </div>
        </div>


    </div>






            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Nb Films</th>
                    <th>   </th>
                    {{--<th>   </th>--}}
                    {{--<th>   </th>--}}

                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>

                        <td>{{$category->id}}</td>
                        <td class="col-md-1"><a href="{{route('category.read',['id'=>$category->id])}}" class="thumbnail"> <img class="img-responsive" src="{{$category->image}}"></a></td>
                        <td><a href="{{route('category.read',['id'=>$category->id])}}">{{$category->title}}</a></td>
                        <td>{{$category->description}}</td>
                        <td><i class="fa fa-film"></i>{{--}}{{$category->description}}--}}</td>
                        {{--<td><a href class="btn btn-default" type="submit"><i class="fa fa-eye"></i> See</a></td>--}}
                        {{--<td><a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i> Delete</a></td>--}}

                        <td><div class="btn-group btn-group-xs">
                                <button type="button" class="btn btn-success"><i class="fa fa-exclamation"></i> Actions</button>
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>




@endsection