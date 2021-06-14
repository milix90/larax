<tr>
    <th scope="row">{{$user->id}}</th>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->role === 0 ? 'Employee' : 'Admin'}}</td>
    <td>
        @if($user->id !== 1)
            <a href="{{route('user.role',['id' => $user->id])}}" class="btn btn-sm btn-success">Change</a>
        @endif
    </td>
    <td>
        @if($user->id !== 1)
            <a href="{{route('user.active',['id' => $user->id])}}" class="btn btn-sm btn-primary">
                {{$user->activate === 0 ? 'Activate' : 'Deactivate'}}
            </a>
        @endif
    </td>
    <td>
        {{\Carbon\Carbon::parse($user->created_at)->format('Y-m-d h:i')}}
    </td>
</tr>
