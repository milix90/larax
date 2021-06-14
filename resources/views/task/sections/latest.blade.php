@if(gettype($lastTasks) !== 'string')
    <div class="card-body">
        <label>
            <span class="badge badge-primary">Last Tasks</span>
        </label>
        @foreach($lastTasks as $task)
            <div class="alert alert-secondary" role="alert">
                {{$task['title']}}
                | {{ \Illuminate\Support\Str::limit($task['description'],35)}} -
                {{ Carbon\Carbon::parse($task['created_at'])->format('Y-m-d h:i') }} -
                {{$task->user->name}}
            </div>
        @endforeach
        <a href="{{route('task.all')}}" class="btn btn-success float-right">All
            Tasks</a>
    </div>
@else
    <div class="mt-3 btn btn-warning">
        {{ $lastTasks }}
    </div>
@endif
