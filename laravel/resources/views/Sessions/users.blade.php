@foreach($users as $user)
    <tr>
        <td>1</td>
        <td>
            <img src="{{$user->avatar}}" alt="" style="width:26px;height:26px;" class="rounded">&nbsp;&nbsp;<a href="#" title="">{{$user->username}}</a>
        </td>
        <td>{{$user->email}}</td>
        <td></td>
    </tr>
@endforeach