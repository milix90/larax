<tr>
    <th scope="row">{{$task->id}}</th>
    <td>{{$task->title}}</td>
    <td>{{\Illuminate\Support\Str::limit($task->description,25)}}</td>
    <td>
        {{$task->user->name}}
        <small>
                                            <span class="badge badge-warning">
                                                {{$task->user->role === 0 ? 'employee' : 'admin'}}
                                            </span><br>
            {{$task->assignUser($task->user_id,$task->assign_id)}}
        </small>
    </td>
    <td>
        <small>
            <a href="{{ route('task.edit',['id' => $task->id ]) }}"
               class="btn btn-sm btn-primary pl-3 pr-3">Edit</a>
            @if($task->user_id === auth()->user()->id)
                <form action="{{route('task.delete',['id' => $task->id])}}"
                      method="post">
                    @csrf
                    @method('delete')
                    <button class="mt-2 btn btn-sm btn-danger" type="submit">Delete
                    </button>
                </form>
            @endif
        </small>
    </td>
    <td>
        @if($task->status === 0)
            @if($task->assign_id === auth()->user()->id)
                <form action="{{route('task.status',['id' => $task->id])}}"
                      method="post">
                    @csrf
                    @method('put')
                    <button class="btn btn-sm btn-success" type="submit">Mark as
                        done
                    </button>
                </form>
            @else
                <span class="badge badge-warning p-2">Doing...</span>
            @endif
        @else
            <span class="badge badge-primary p-2">Task Done</span>
        @endif
    </td>
    <td>
        <small>
            [{{ \Carbon\Carbon::parse($task->created_at)->format('Y-m-d_h:i') }}]  -
            [{{ \Carbon\Carbon::parse($task->created_at) <
            \Carbon\Carbon::parse($task->updated_at) &&
             $task->status === 1 ?
            \Carbon\Carbon::parse($task->updated_at)->format('Y-m-d_h:i') : 'Not Ended'
            }}]
        </small>
    </td>
</tr>
