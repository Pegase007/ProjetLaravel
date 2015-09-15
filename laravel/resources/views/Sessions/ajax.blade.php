
    <div class="panel panel-success widget-support-tickets" id=" dashboard-support-tickets">
        <div class="panel-heading">
            <span class="panel-title"><i class="panel-title-icon fa fa-bullhorn"></i>Prochaines scéances</span>
            <div class="panel-heading-controls">
                <div class="panel-heading-text"><a href="#">{{$tocome->coming}} scéances à venir</a></div>
            </div>
        </div> <!-- / .panel-heading -->
        <div   class="panel-body tab-content-padding">
            <!-- Panel padding, without vertical padding -->
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="panel-padding no-padding-vr" style="overflow: hidden; width: auto; height: 300px;">

                    @foreach($comingsoon as $movie)
                        <div class="ticket">


                            @if(($movie->dif) < 2)
                                <span class="label label-danger ticket-label">Sortie dans {{$movie->dif}}</span>
                            @elseif(($movie->dif) < 6)
                                <span class="label label-warning ticket-label">Sortie dans {{$movie->dif}}</span>
                            @elseif(($movie->dif) < 15)
                                <span class="label label-info ticket-label">Sortie dans {{$movie->dif}}</span>
                            @elseif(($movie->dif) > 15)
                                <span class="label label-success ticket-label">Sortie dans {{$movie->dif}}</span>
                            @endif

                            <a href="#" title="" class="ticket-title">{{$movie->movies}}<span>[#{{$movie->id}}]</span></a>
								<span class="ticket-info">
									Diffusé à <a href="#" title="">{{$movie->cinema}}</a>
								</span>
                        </div> <!-- / .ticket -->

                    @endforeach
                </div>
            </div>
        </div> <!-- / .panel-body -->
    </div> <!-- / .panel -->

