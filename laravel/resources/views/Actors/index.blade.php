@extends('layout')

@section('title')

    Actors Index

@endsection
@section('contentheader')

    Actors Index
@endsection

@section('breadscrumb')
    <li><a href="#"> Home /  </a><a href="#">Actors / </a><a href="#"> Index </a></li>
@endsection

{{--Ecrire dans la session content--}}
@section('content')

        <div class="title">Actors Index</div>



        {{--<h3> {{$title}} </h3>--}}
        {{--<ul>--}}
            {{--@foreach($noms as $nom)--}}

                {{--<li> {{ $nom }}</li>--}}

            {{--@endforeach--}}


            {{--@foreach($age as $ages)--}}

                {{--<li> {{ $ages }}</li>--}}

            {{--@endforeach--}}

        {{--</ul>--}}

        {{--<ul>--}}
            {{--@foreach($localite as $ville=>$acteurs)--}}

                {{--@if($ville == "Paris")--}}
                    {{--<li>{{$ville}}:</li>--}}

                    {{--<ul>--}}
                        {{--@foreach($acteurs as $act)--}}

                            {{--{{$act}},--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--@endif--}}
            {{--@endforeach--}}
        {{--</ul>--}}
{{--<p> {{$chaine or "Texte par défault"}}</p>--}}

        {{--<ul>--}}
            {{--@foreach($acteurs as $clef=>$valeur)--}}


                {{--<li>{{$valeur}}</li>--}}


            {{--@endforeach--}}
        {{--</ul>--}}



        <div class="table-success">
            <div class="table-header">
                <div class="table-caption">
                    Success Table
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Dob</th>
                    <th>City</th>
                    <th>Nationality</th>
                </tr>
                </thead>
                <tbody>
                @foreach($actors as $actor)
                <tr>

                    <td>{{$actor->id}}</td>
                    <td>{{$actor->lastname}}</td>
                    <td>{{$actor->firstname}}</td>
                    <td>{{$actor->dob}}</td>
                    <td>{{$actor->city}}</td>
                    <td>{{$actor->nationality}}</td>
                </tr>
                    @endforeach
                </tbody>
            </table>

        </div>





@endsection