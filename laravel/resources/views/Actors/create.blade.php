@extends('layout')

@section('title')

    Actors Create

@endsection
@section('contentheader')

    Actors Create
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Actors / </a><a href="#"> Create </a></li>
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


        <form enctype="multipart/form-data" class="panel form-horizontal" method="post" action="{{ route('actors.post') }}">

            {{-- Important:CSRF attaque, moyen de détourner un formulaire et envoyer les données ailleur--}}
            {{csrf_field()}}
            <div class="panel-heading">
                <span class="panel-title">Creation d'un acteur</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lastname" id="lastname" value="{{ Input::old('lastname') }}" placeholder="Nom">
                        @if ($errors->has('lastname')) <p class="help-block text-danger">{{$errors->first('lastname')}}</p>@endif
                    </div>
                </div> <!-- / .form-group -->
                <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">Prenom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Prenom">
                        @if ($errors->has('firstname')) <p class="help-block text-danger">{{$errors->first('firstname')}}</p>@endif
                    </div>
                </div> <!-- / .form-group -->
                <div class="form-group">
                    <label for="dob" class="col-sm-2 control-label">Date de naissance</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control date" name="dob" id="dob" placeholder="YYYY/mm/dd">
                        @if ($errors->has('dob')) <p class="help-block text-danger">{{$errors->first('dob')}}</p>@endif
                    </div>
                </div> <!-- / .form-group -->
                <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="image" id="image" placeholder="http://">
                        @if ($errors->has('image')) <p class="help-block text-danger">{{$errors->first('image')}}</p>@endif

                    </div>
                </div> <!-- / .form-group -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nationalité</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="nationality" id="Français" value="Français" class="px" checked="">
                                <span class="lbl">Français</span>
                            </label>
                        </div> <!-- / .radio -->
                        <div class="radio">
                            <label>
                                <input type="radio" name="nationality" id="Anglais" value="Anglais" class="px">
                                <span class="lbl">Anglais</span>
                            </label>
                        </div> <!-- / .radio -->
                        <div class="radio">
                            <label>
                                <input type="radio" name="nationality" id="Espagnol" value="Espagnol" class="px">
                                <span class="lbl">Espagnol</span>
                            </label>
                        </div> <!-- / .radio -->
                        <div class="radio">
                            <label>
                                <input type="radio" name="nationality" id="Allemand" value="Allemand" class="px">
                                <span class="lbl">Allemand</span>
                            </label>
                        </div> <!-- / .radio -->
                    </div> <!-- / .col-sm-10 -->
                </div> <!-- / .form-group -->



                <div class="form-group">
                    <label  name="roles" class="col-sm-2 control-label">Roles</label>
                    <div class="col-sm-10">
                        <select name="roles">
                            <option id="acteur" value="acteur">Acteur</option>
                            <option id="compositeur" value="compositeur">Compositeur</option>
                            <option id="doubleur" value="doubleur">Doubleur</option>
                            <option id="realisateur" value="realisateur">Realisateur</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label  name="filmography" class="col-sm-2 control-label">Filmography</label>
                    <div class="col-sm-10">
                        <select multiple class="js-example-tags" name="filmography">

                            @foreach( $movies  as $movie)

                                <option value="{{$movie->id}}">{{$movie->title}}</option>

                            @endforeach

                        </select>
                    </div>
                </div>



                <!-- / .form-group -->
                <div class="form-group">
                    <label for="recompenses" class="col-sm-2 control-label">Recompenses</label>
                    <div class="col-sm-10">
                        <textarea name="recompenses" name="recompenses" id="recompenses"  class="form-control">{{$errors->first('recompenses')}}</textarea>
                        @if ($errors->has('recompenses')) <p class="help-block text-danger">{{$errors->first('recompenses')}}</p>@endif
                    </div>
                </div> <!-- / .form-group -->

                <div class="form-group">
                    <label for="biography" class="col-sm-2 control-label">Biography</label>
                    <div class="col-sm-10">
                        <textarea name="biography" name="biography" id="biography"  class="wyswyg form-control">{{$errors->first('biography')}}</textarea>
                        @if ($errors->has('biography')) <p class="help-block text-danger">{{$errors->first('biography')}}</p>@endif
                    </div>
                </div> <!-- / .form-group -->








                <div class="form-group" style="margin-bottom: 0;">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Creer</button>
                    </div>
                </div> <!-- / .form-group -->
            </div>
        </form>



    </div>

@endsection