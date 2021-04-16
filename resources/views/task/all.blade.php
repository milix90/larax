@extends('layouts.app')
@section('title','All Tasks')
@section('content')
    @include('errors.errors')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Tasks
                        <span class="float-right">
                            <a href="{{route('home')}}" class="btn btn-primary">Back to Home</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">User</th>
                                <th scope="col">Actions</th>
                                <th scope="col">Status</th>
                                <th scope="col">Start/End</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <th scope="row">{{$task->id}}</th>
                                    <td>{{$task->title}}</td>
                                    <td>{{\Illuminate\Support\Str::limit($task->description,25)}}</td>
                                    <td>
                                        {{$task->user->name}}
                                        <small>
                                            <span class="badge badge-warning">
                                                {{$task->user->role === 0 ? 'employee' : 'admin'}}
                                            </span>
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
                                                <span class="badge badge-success p-2">Doing...</span>
                                            @endif
                                        @else
                                            <span class="badge badge-primary p-2">Task Done</span>
                                        @endif
                                        <span class="mt-2 badge badge-primary p-2">
                                                {{$task->assign_id === $task->user_id  ? 'Owned' : 'Assigned'}}
                                        </span>
                                    </td>
                                    <td>
                                        <small>
                                            {{\Carbon\Carbon::parse($task->created_at)->format('Y-m-d_h:i')}}
                                            {{\Carbon\Carbon::parse($task->created_at) <
                                            \Carbon\Carbon::parse($task->updated_at) &&
                                             $task->status === 1 ?
                                            '/' . \Carbon\Carbon::parse($task->updated_at)->format('Y-m-d_h:i') : '/ Not Ended'
                                            }}
                                        </small>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {!! $tasks->render() !!}
        </div>
    </div>
@endsection
