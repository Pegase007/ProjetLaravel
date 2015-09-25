
@foreach($temoignages as $temoignage)
    <div class="thread">
        {{--{{dump($temoignage->cinema)}}--}}
        <img src="{{$temoignage->cinema->image}}" alt="" class="thread-avatar">
        <div class="thread-body">
            <span class="thread-time">{{$temoignage->date}}</span>
            <a href="#" class="thread-title">{{$temoignage->accroche}}</a>
            <p>{{$temoignage->contenu}}</p>
            <div class="thread-info">Commenté par <a href="#" title="">{{$temoignage->cinema->title}}</a> sur <a href="#" title="">{{$temoignage->movies->title}}</a></div>
        </div> <!-- / .thread-body -->
    </div> <!-- / .thread -->

@endforeach