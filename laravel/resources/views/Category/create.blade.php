@extends('layout')

@section('title')

    Category Create

@endsection
@section('contentheader')

    Category Create
@endsection

@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Category / </a><a href="#"> Create </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

    @if (count($errors) > 0)

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>
    @endif




    <form enctype="multipart/form-data" class="panel form-horizontal" method="post" action="{{ route('category.post') }}">

        {{-- Important:CSRF attaque, moyen de détourner un formulaire et envoyer les données ailleur--}}
        {{csrf_field()}}
        <div class="panel-heading">
            <span class="panel-title">Creation d'une catégories</span>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="title" value="{{ Input::old('title') }}" placeholder="Title">
                    @if ($errors->has('title')) <p class="help-block text-danger">{{$errors->first('title')}}</p>@endif
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="image" id="image" placeholder="http://">
                    @if ($errors->has('image')) <p class="help-block text-danger">{{$errors->first('image')}}</p>@endif

                </div>
            </div>

                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea name="description" name="description" id="description"  class="wyswyg form-control">{{ Input::old('description') }}</textarea>
                        @if ($errors->has('description')) <p class="help-block text-danger">{{$errors->first('description')}}</p>@endif
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