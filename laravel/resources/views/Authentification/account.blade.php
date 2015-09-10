@extends('layout')


@section('title')

    Account

@endsection
@section('contentheader')

    Account

@endsection
@section('breadscrumb')
    <li><a href="#"> Account </a></li>
@endsection
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


        <form enctype="multipart/form-data" class="panel form-horizontal" method="post"  action="{{ route('update')}}">

            {{-- Important:CSRF attaque, moyen de détourner un formulaire et envoyer les données ailleur--}}
            {{csrf_field()}}
            <div class="panel-heading">
                <span class="panel-title">Modify Account</span>
            </div>



            <div class="panel-body">


                <div class="form-group">
                    <label for="prenom" class="col-sm-2 control-label">Prenom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="prenom" id="prenom" value="{{ Auth::user()->prenom }}" placeholder="{{ Auth::user()->prenom }}">
                        @if ($errors->has('prenom')) <p class="help-block text-danger">{{$errors->first('prenom')}}</p>@endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}" placeholder="{{ Auth::user()->name }}">
                        @if ($errors->has('name')) <p class="help-block text-danger">{{$errors->first('name')}}</p>@endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-2 control-label">Photo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="photo" id="photo" value="{{ Auth::user()->photo }}" placeholder="{{ Auth::user()->photo }}">
                        @if ($errors->has('photo')) <p class="help-block text-danger">{{$errors->first('photo')}}</p>@endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="ville" class="col-sm-2 control-label">Ville</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="ville" id="ville" value="{{ Auth::user()->ville }}" placeholder="{{ Auth::user()->ville }}">
                        @if ($errors->has('ville')) <p class="help-block text-danger">{{$errors->first('ville')}}</p>@endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password" id="password" value="" placeholder="Password">
                        @if ($errors->has('password')) <p class="help-block text-danger">{{$errors->first('password')}}</p>@endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="col-sm-2 control-label">Password Confirm</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ Auth::user()->password_confirmation }}" placeholder="Password Confirmation">
                        @if ($errors->has('password_confirmation')) <p class="help-block text-danger">{{$errors->first('password_confirmation')}}</p>@endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" name="description" id="description" value="{{ Auth::user()->description }}" placeholder="">{{ Auth::user()->description }}</textarea>
                        @if ($errors->has('description')) <p class="help-block text-danger">{{$errors->first('description')}}</p>@endif
                    </div>
                </div>





                <div class="form-group" style="margin-bottom: 0;">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Modify</button>
                    </div>
                </div> <!-- / .form-group -->
            </div>
        </form>



    </div>










@endsection

