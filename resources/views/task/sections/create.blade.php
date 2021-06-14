<label>
    <span class="badge badge-success">Create new task</span>
</label>
<form action="{{route('task.create')}}" method="post">
    @csrf
    <input type="text" name="title" class="form-control"
           placeholder="Title">
    <textarea name="description" class="mt-3 form-control" cols="30" rows="5"
              placeholder="Description"></textarea>
    @if(auth()->user()->role === 1)
        <select class="custom-select mr-sm-2 mt-3"
                name="assign_id">
            <option hidden selected>Select user</option>
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    @endif
    <button class="mt-4 btn btn-primary float-right">Create</button>
</form>
