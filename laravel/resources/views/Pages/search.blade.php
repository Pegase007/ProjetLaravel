@extends('layout')

@section('title')
    Search
@endsection
@section('contentheader')
   Search
@endsection

{{--Ecrire dans la session content--}}
@section('content')

    {{--Formulaire: action => destination ou tu envois les données--}}
    {{--method! méthode denvois des données  GET|POST  --}}

    <form action="{{route('search')}}" class="panel form-horizontal" method="GET">
        <div class="panel-heading">
            <span class="panel-title">Beautiful Form</span>
        </div>
        <div class="panel-body">
            <div class="row form-group">
                <label class="col-sm-4 control-label" for="title">Title:</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="Title" name="title" id="title" class="form-control">
                </div>
            </div>

        </div>
        <div class="panel-body">
            <div class="row form-group">
                <label class="col-sm-4 control-label" for="title">Select:</label>
                <div class="col-sm-8">

        <select name="'lang" class="form-control">
            <option></option>
            <option value="Fr">FR</option>
            <option value="En">EN</option>
        </select>
                </div>
            </div>

        </div>


        <div class="panel-footer text-right">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>

@endsection