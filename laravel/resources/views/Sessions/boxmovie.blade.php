@foreach(session("favoris",[]) as $key  => $val )


    <div class="message">
        <img src="{{\App\Model\Movies::select('image')->where('id','=',(int)$val)->first()->image}}" alt="" class="message-avatar">

        <a href="#" class="message-subject"> {{\App\Model\Movies::select('title')->where('id','=',(int)$val)->first()->title}}</a>
        <div class="message-description">


        </div>
    </div> <!-- / .message -->
@endforeach