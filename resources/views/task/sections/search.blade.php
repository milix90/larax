<div class="form-group">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <form action="{{ route('task.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-xs-4 ml-3">
                    <select id="dob_month" class="form-control" name="assign_id">
                        <option value="" hidden>Select Employee</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}"> {{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-4 ml-3">
                    <select id="dob_month" class="form-control" name="status">
                        <option value="" hidden>Select Status</option>
                        <option value="0"> Doing</option>
                        <option value="1"> Done</option>
                    </select>
                </div>
                <div class="col-xs-4 ml-3">
                    <select id="dob_month" class="form-control" name="created_at">
                        <option value="" hidden> Date</option>
                        @foreach($start as $d)
                            <option value="{{$d}}"> {{$d}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="ml-2 btn btn-primary">Filter</button>
            </div>
        </form>
    </div>
</div>
