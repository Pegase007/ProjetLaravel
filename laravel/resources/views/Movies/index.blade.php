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

    {{--STATS PANEL--}}


    <div class="col-md-6">

        <div class="stat-panel ">
            <!-- Success background, bordered, without top and bottom borders, without left border, without padding, vertically and horizontally centered text, large text -->
            <a href="#" class="stat-cell col-md-4 bg-success bordered no-border-vr no-border-l no-padding valign-middle text-center text-lg">
                <i class="fa fa-film"></i>&nbsp;&nbsp;{{$counter}}<strong> Films</strong>
            </a> <!-- /.stat-cell -->
            <!-- Without padding, extra small text -->
            <div class="stat-cell col-md-4 no-padding valign-middle">
                <!-- Add parent div.stat-rows if you want build nested rows -->
                <div class="stat-rows">
                    <div class="stat-row">
                        <!-- Success background, small padding, vertically aligned text -->
                        <a href="#" class="stat-cell bg-success padding-sm valign-middle">
                            {{$top}} films en avant
                            <i class="fa fa-star pull-right"></i>
                        </a>
                    </div>
                    <div class="stat-row">
                        <!-- Success darken background, small padding, vertically aligned text -->
                        <a href="#" class="stat-cell bg-success darken padding-sm valign-middle">
                            {{$futureRelease}} films pas encore sortis
                            <i class="fa fa-hourglass-end pull-right"></i>

                        </a>
                    </div>
                    <div class="stat-row">
                        <!-- Success darker background, small padding, vertically aligned text -->
                        <a href="#" class="stat-cell bg-success darker padding-sm valign-middle">
                            {{$actif}} films actifs
                            <i class="fa fa-eye pull-right"></i>
                        </a>
                    </div>
                </div> <!-- /.stat-rows -->
            </div> <!-- /.stat-cell -->
        </div> <!-- /.stat-panel -->
    </div>

    {{--END STATS PANEL--}}


    <div class="col-md-6">

        <div class="stat-panel">
            <!-- Success background. vertically centered text -->
            <div class="stat-cell bg-danger valign-middle">
                <!-- Stat panel bg icon -->
                <i class="fa fa-comments bg-icon"></i>
                <!-- Extra large text -->
                <span class="text-xlg"><strong>{{number_format($budget,2,',',' ')}} €</strong></span><br>
                <!-- Big text -->
                <span class="text-bg">Budget total</span><br>
                <!-- Small text -->
                <span class="text-sm">Année 2015</span>
            </div> <!-- /.stat-cell -->
        </div> <!-- /.stat-panel -->

    </div>
    {{--END BUDGET PANEL--}}

    </div>

    {{--BUDGET PANEL--}}






    {{--TABLE HEADER WITH SORT BY BUTTONS--}}

    <form action="{{route('movies.actions')}}" class="panel form-horizontal" method="GET">
        <div class="table">
            <div class="table-header">

                <div>
                    <div class="col-md-2 table-caption">
                        Movie Table
                    </div>

                    <div class=" btn-toolbar" role="toolbar">
                        <div class="btn-group">
                            <a href="{{route('movies.condition',['condition'=>'visible'])}}" type="button" class="btn @if(Request::segment(3) === 'visible') btn-success @else btn-default @endif btn-xs "><i class="fa fa-eye"></i> Visible</a>
                            <a href="{{route('movies.condition',['condition'=>'invisible'])}}" type="button" class="btn @if(Request::segment(3) === 'invisible') btn-success @else btn-default @endif btn-xs"><i class="fa fa-eye-slash"></i> Invisible</a>
                        </div>
                        <div class="btn-group">

                            <a href="{{route('movies.condition',['condition'=>'VO'])}}" type="button" class="btn @if(Request::segment(3) === 'VO') btn-success @else btn-default @endif btn-xs"><i class="fa fa-language"></i> VO</a>
                            <a href="{{route('movies.condition',['condition'=>'VF'])}}" type="button" class="btn @if(Request::segment(3) === 'VF') btn-success @else btn-default @endif btn-xs"><i class="fa fa-language"></i> VF</a>
                            <a href="{{route('movies.condition',['condition'=>'VOST'])}}" type="button" class="btn @if(Request::segment(3) === 'VOST') btn-success @else btn-default @endif btn-xs"><i class="fa fa-language"></i> VOST</a>
                            <a href="{{route('movies.condition',['condition'=>'VOSTFR'])}}" type="button" class="btn @if(Request::segment(3) === 'VOSTFR') btn-success @else btn-default @endif btn-xs"><i class="fa fa-language"></i> VOSTFR</a>
                        </div>
                        <div class="btn-group">

                            <a href="{{route('movies.condition',['condition'=>'WarnerBros'])}}" type="button" class="btn @if(Request::segment(3) === 'WarnerBros') btn-success @else btn-default @endif btn-xs"><i class="fa fa-video-camera"></i> Warner Bros</a>
                            <a href="{{route('movies.condition',['condition'=>'HBO'])}}" type="button" class="btn @if(Request::segment(3) === 'HBO') btn-success @else btn-default @endif btn-xs"><i class="fa fa-video-camera"></i> HBO</a>
                        </div>
                        <div class="btn-group">
                            <a href="{{route('movies.index')}}" type="button" class="btn @if(Request::segment(3) == '') btn-success @else btn-default @endif btn-xs">TOUS</a>

                        </div>
                        <div class="btn-group">
                            <a href="{{route('movies.trash')}}" type="button" class="btn @if(Request::segment(2) == 'trash') btn-success @else btn-default @endif btn-xs">Trash</a>

                        </div>

                        <div class="btn-group btn-group-xs">
                            <select id="actions" name="actions" class="form-control">
                                <option></option>
                                <option value="Supprimer">Supprimer</option>
                                <option value="Activer">Activer</option>
                                <option value="Desactiver">Desactiver</option>
                            </select>
                            <button type="submit" class="btn  btn-default btn-xs">OK</button>

                        </div>
                    </div>
                </div>
            </div>


            {{--TABLE--}}

            <table id='list' class="table table-success table-bordered">
                <thead>
                <tr>

                    {{--LABELS--}}


                    <th>id </th>
                    <th>Image</th>
                    <th>Enable</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Lges</th>
                    {{--<th>Distributeur</th>--}}
                    <th>Categories</th>
                    <th>Bo</th>
                    <th>Annee</th>
                    {{--<th>Created at</th>--}}
                    {{--<th>Updated at</th>--}}

                    {{-- SEE COLUMN --}}
                    {{--<th></th> --}}

                    {{-- DELETE COLUMN --}}

                    <th>Note</th>
                    @if(Route::current()->getName() == 'movies.trash')
                    <th></th>
                    @else
                    <th></th>
                    <th>Actions</th>
                    @endif

                </tr>
                </thead>
                <tbody>
                @foreach($movies as $movie)
                    <tr>



                        {{--FILL IN TABLE ROW FOR EACH MOVIE --}}

                        <td><label class="px-single"><input data-url="{{route('movies.delete',['id'=> $movie->id])}}" type="checkbox" name="movies[]" value="{{$movie->id}}" class="px"><span class="lbl"></span></label>  {{$movie->id}} </td>
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
                        {{--<td>{{$movie->distributeur}}</td>--}}
                        <td>{{ $movie->categories->title }}</td>
                        <td>{{$movie->bo}}</td>
                        <td>{{$movie->annee}}</td>
                        {{--<td>{{$movie->created_at}}</td>--}}
                        {{--<td>{{$movie->updated_at}}</td>--}}

                        {{--SEE BUTTON --}}
                        {{--<td><button class="btn btn-default" type="submit"><i class="fa fa-eye"></i> See</button></td>--}}


                        <td>{{$movie->note_presse}}</td>

                        @if(Route::current()->getName() == 'movies.trash')
                            <td><a href="{{route('movies.restore',['id'=>$movie->id])}}" class="btn btn-success" id=recover type="submit"> Recover</a></td>
                        @else
                            {{--DELETE BUTTON--}}
                            <td><a href="{{route('movies.delete',['id'=>$movie->id])}}" class="btn btn-danger" type="submit"><i class="fa fa-trash-o"></i> Delete</a></td>
                            <td>
                                <a href="{{route('movies.update',['id'=>$movie->id , 'action'=> 'up'])}}" class="btn btn-primary btn-xs " type="submit"><i class="fa fa-thumbs-o-up"></i> Note up</a>

                                <a href="{{route('movies.update',['id'=>$movie->id , 'action'=> 'down'])}}" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-thumbs-o-down"></i> Note down</a>


                            </td>
                        @endif

                        {{--ACTIONS COLUM--}}


                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>
    </form>






@endsection