@extends('layouts.app')
@section('title','Edit Task : '.' '.$task->title)
@section('content')
    @include('errors.errors')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit Task : {{$task->title}}
                        <span class="float-right">
                            <a href="{{route('task.all')}}" class="btn btn-primary">Back to Tasks</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <form action="{{route('task.update', ['id' => $task->id])}}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{$task->id}}">
                            <label>Title
                                <input type="text" name="title" class="form-control"
                                       value="{{isset($task->title) ? $task->title : old('title')}}">
                            </label>
                            <textarea name="description"
                                      cols="10" rows="5"
                                      class="form-control"
                                      placeholder="Description"
                            >{{isset($task->description) ? $task->description : old('description')}}</textarea>
                            @if(auth()->user()->role === 1)
                                <select class="custom-select mr-sm-2 mt-3"
                                        name="assign_id">
                                    <option hidden selected>Select user</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            @endif
                            <button class="mt-3 btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
