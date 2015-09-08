@extends('layout')

@section('title')

    Directors Create

@endsection
@section('contentheader')

    Directors Create
@endsection
@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Directors / </a><a href="#"> Create </a></li>
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






        <form enctype="multipart/form-data" class="panel form-horizontal" method="post" action="{{ route('directors.post') }}">

            {{-- Important:CSRF attaque, moyen de détourner un formulaire et envoyer les données ailleur--}}
            {{csrf_field()}}
            <div class="panel-heading">
                <span class="panel-title">Creation d'un réalisateur</span>
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
                </div>
                <div class="form-group">
                    <label for="note" class="col-sm-2 control-label">Note</label>
                    <div class="col-sm-10">
                        <input  class="form-control" name="note" id="note" placeholder="Note">
                        @if ($errors->has('note')) <p class="help-block text-danger">{{$errors->first('note')}}</p>@endif

                    </div>
                </div>

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








@endsection