@extends('layout')

@section('title')

    Movies Create

@endsection
@section('contentheader')

    Movies Create
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Movies / </a><a href="#"> Create </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')


    <div class="col-md-12">


        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach
                </ul>
            </div>
        @endif


        <form enctype="multipart/form-data" class="panel form-horizontal" method="post" action="{{ route('movies.post') }}">

            {{-- Important:CSRF attaque, moyen de détourner un formulaire et envoyer les données ailleur--}}
            {{csrf_field()}}
            <div class="panel-heading">
                <span class="panel-title">Creation d'un film</span>
            </div>



            <div class="panel-body">

                <div class="form-group">
                    <label for="type_film" class="col-sm-2 control-label">Type de Film</label>

                    <label class="col-sm-2 radio"><input type="radio" name="type_film" value="long-metrage" class="px"><span class="lbl">Long Metrage</span></label>
                    <label class="radio"><input type="radio" name="type_film" value="long-metrage" class="px"><span class="lbl">Court Metrage</span></label>

                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title" value="{{ Input::old('title') }}" placeholder="Title">
                        @if ($errors->has('title')) <p class="help-block text-danger">{{$errors->first('title')}}</p>@endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="budget" class="col-sm-2 control-label">Budget</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="budget" id="budget" value="{{ Input::old('budget') }}" placeholder="Budget">
                        @if ($errors->has('budget')) <p class="help-block text-danger">{{$errors->first('budget')}}</p>@endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="duree" class="col-sm-2 control-label">Duree</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="duree" id="duree" value="{{ Input::old('duree') }}" placeholder="Duree">
                        @if ($errors->has('duree')) <p class="help-block text-danger">{{$errors->first('duree')}}</p>@endif
                    </div>
                </div>
                <div class="form-group">
                    <label  name="directors" class="col-sm-2 control-label">Directors</label>
                    <div class="col-sm-10">
                        <select multiple class="js-example-tags" name="directors_id[]"  >

                            @foreach( $directors  as $director)

                                <option value="{{$director->id}}">{{$director->firstname}} {{$director->lastname}}</option>

                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label  name="actors_id" class="col-sm-2 control-label">Actors</label>
                    <div class="col-sm-10">
                        <select multiple class="js-example-tags" name="actors_id[]">

                            @foreach( $actors  as $actor)

                                <option value="{{$actor->id}}">{{$actor->firstname}} {{$actor->lastname}}</option>

                            @endforeach

                        </select>
                    </div>
                </div>


                 <!-- / .form-group -->
                <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="image" id="image" placeholder="http://">
                        @if ($errors->has('image')) <p class="help-block text-danger">{{$errors->first('image')}}</p>@endif

                    </div>
                </div>

                <!-- / .form-group -->
                <div class="form-group">
                    <label for="trailer" class="col-sm-2 control-label">Trailer</label>
                    <div class="col-sm-10">
                        <input  class="form-control" name="trailer" id="trailer" placeholder="http://">
                        @if ($errors->has('trailer')) <p class="help-block text-danger">{{$errors->first('trailer')}}</p>@endif

                    </div>
                </div>

                <div class="form-group">
                    <label  name="categories_id" class="col-sm-2 control-label">Categories</label>
                    <div class="col-sm-10">
                        <select  class="js-example-tags" name="categories_id">

                            @foreach( $categories  as $category)

                                <option value="{{$category->id}}">{{$category->title}}</option>

                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label  name="languages" class="col-sm-2 control-label">Languages</label>
                    <div class="col-sm-10">
                        <select class="js-example-tags" name="languages">


                                <option value="Anglais">Anglais</option>
                                <option value="Français">Français</option>
                                <option value="Espagnol">Espagnol</option>
                                <option value="Allemand">Allemand</option>



                        </select>
                    </div>
                </div>

                <!-- / .form-group -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">BO</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="bo" id="vostfr" value="vostfr" class="px" checked="">
                                <span class="lbl">VO</span>
                            </label>
                        </div> <!-- / .radio -->
                        <div class="radio">
                            <label>
                                <input type="radio" name="bo" id="vostfr" value="vostfr" class="px">
                                <span class="lbl">VOST</span>
                            </label>
                        </div> <!-- / .radio -->
                        <div class="radio">
                            <label>
                                <input type="radio" name="bo" id="vostfr" value="vostfr" class="px">
                                <span class="lbl">VOSTFR</span>
                            </label>
                        </div> <!-- / .radio -->
                        <div class="radio">
                            <label>
                                <input type="radio" name="bo" id="fr" value="fr" class="px">
                                <span class="lbl">FR</span>
                            </label>
                        </div> <!-- / .radio -->
                    </div> <!-- / .col-sm-10 -->
                </div> <!-- / .form-group -->


                <!-- / .form-group -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Distributeur</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="distributeur" id="warner_bros" value="warner_bros" class="px" checked="">
                                <span class="lbl">Warner Bros</span>
                            </label>
                        </div> <!-- / .radio -->
                        <div class="radio">
                            <label>
                                <input type="radio" name="distributeur" id="hbo" value="hbo" class="px">
                                <span class="lbl">HBO</span>
                            </label>
                        </div> <!-- / .radio -->

                    </div> <!-- / .col-sm-10 -->
                </div> <!-- / .form-group -->


                <div class="form-group">
                    <label for="date_release" class="col-sm-2 control-label">Date Release</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control date" name="date_release" id="date_release" placeholder="date">
                        @if ($errors->has('date_release')) <p class="help-block text-danger">{{$errors->first('date_release')}}</p>@endif
                    </div>
                </div>

                {{--<div class="form-group">--}}
                    {{--<label for="annee" class="col-sm-2 control-label">Annee</label>--}}
                    {{--<div class="col-sm-10">--}}
                        {{--<input type="hidden" class="form-control" name="annee" id="annee" value="{{ substr(Input::old('date_release'), -4) }}" placeholder="annee">--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group">
                    <label for="note_presse" class="col-sm-2 control-label">Note_presse</label>
                    <div class="col-sm-10">
                        <input type="hidden"   name="note_presse" id="note_presse" value="5"  >


                        <div id="slider"  class="range-slider ui-slider-colors-demo ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all col-md-offset-1 col-md-8" data-slider data-options="start: 1; end: 10;">
                            <span class="range-slider-handle" role="slider" tabindex="0"></span>
                            <span class="range-slider-active-segment"></span>
                            <input type="hidden">
                        </div>



                    </div>
                </div>



                <div class="form-group">
                    <label for="visible" class="col-sm-2 control-label">Visibility</label>
                    <label class="col-sm-2 radio"><input type="radio" name="visible" checked="checked" value="1" class="px"><span class="lbl">Visible</span></label>
                    <label class="radio"><input type="radio" name="visible"  value="0" class="px"><span class="lbl">Invisible</span></label>
                </div>

                <div class="form-group">
                    <label for="cover" class="col-sm-2 control-label">Cover</label>
                    <label class="col-sm-2 radio"><input type="radio" name="cover" value="1" class="px"><span class="lbl">Cover</span></label>
                    <label class="radio"><input type="radio" name="cover" checked="checked" value="0" class="px"><span class="lbl">Not-Cover</span></label>
                </div>
                <!-- / .form-group -->
                <div class="form-group">
                    <label for="synopsis" class="col-sm-2 control-label">Synopsis</label>
                    <div class="col-sm-10">
                        <textarea name="synopsis" id="synopsis"  class="form-control">{{$errors->first('synopsis')}}</textarea>
                        @if ($errors->has('synopsis')) <p class="help-block text-danger">{{$errors->first('synopsis')}}</p>@endif
                        <div id="character-limit-input-label" class="limiter-label form-group-margin">
                            Characters left: <span class="limiter-count">140</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea name="description" name="description" id="description"  class="wyswyg form-control">{{$errors->first('description')}}</textarea>
                        @if ($errors->has('description')) <p class="help-block text-danger">{{$errors->first('description')}}</p>@endif
                    </div>
                </div>


                <div class="form-group" style="margin-bottom: 0;">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Creer</button>
                    </div>
                </div> <!-- / .form-group -->
            </div>
        </form>



    </div>



@endsection