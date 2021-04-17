<div class="form-group">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <form action="#" method="post">
            <div class="row">
                <div class="col-xs-4 ml-3">
                    <select id="dob_month" class="form-control" name="dob_month">
                        <option hidden>Select User</option>
                        <option value="0">All</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}"> {{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-4 ml-3">
                    <select id="dob_month" class="form-control" name="dob_month">
                        <option value="1" hidden>Select Status</option>
                        <option value="all"> All</option>
                        <option value="0"> Doing</option>
                        <option value="1"> Done</option>
                    </select>
                </div>
                <div class="col-xs-4 ml-3">
                    <select id="dob_month" class="form-control" name="dob_month">
                        <option hidden> Date</option>
                        <option value="all"> All</option>
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
