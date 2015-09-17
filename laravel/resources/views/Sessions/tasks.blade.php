

    @foreach($tasks as $task)
        <div  class="task @if($task->state==1) completed @endif" id="taks_{{ $task->id  }}">


            @if(( $time=\App\Model\Tasks::select(DB::raw('TIMESTAMPDIFF(HOUR,NOW(), date) as date'))->where('id', '=', $task->id)->first()->date) < 24)

                <span class="label label-danger pull-right">High</span>

            @elseif(( $time=\App\Model\Tasks::select(DB::raw('TIMESTAMPDIFF(HOUR,NOW(), date) as date'))->where('id', '=', $task->id)->first()->date)<72)

                <span class="label label-warning pull-right">Medium</span>
            @else
                <span class="label label-default pull-right">Low</span>
            @endif



            <div class="fa fa-arrows-v task-sort-icon"></div>
            <div class="action-checkbox">
                <label class="px-single">
                    <input data-url="{{route('state',['id'=> $task->id])}}"  class="px" type="checkbox" id="taskcheckbox" name="task[]" value="{{$task->id}}" @if($task->state == 1)checked @endif><span class="lbl"></span></label>
            </div>




            <a href="#" class="task-title">{{$task->content}}<span>
                     {{  \Carbon\Carbon::createFromTimeStamp(strtotime($task->date))->diffForHumans() }}
                    </span></a>
        </div> <!-- / .task -->
    @endforeach
