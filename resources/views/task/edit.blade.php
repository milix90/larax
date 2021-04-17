@extends('layouts.app')
@section('title','Edit Task : '.' '.$task->title)
@section('content')
    @include('errors.errors')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Task : {{$task->title}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('task.update', ['id' => $task->id])}}" method="post">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{$task->id}}">
                            <input type="text" name="title" class="form-control mb-2" placeholder="Title"
                                   value="{{isset($task->title) ? $task->title : old('title')}}">
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
                            <a href="{{route('task.all')}}" class="mt-3 ml-2 btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
