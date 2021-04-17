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
                            <a href="{{route('task.all')}}" class="btn btn-primary">Back to Tasks</a>
                        </span>
                    </div>
                    <div class="card-body">
                        @if(auth()->user()->role === 1)
                            @include('task.sections.search',['users' => $tasks['users'],'start' => $tasks['startDate']])
                            <hr>
                        @endif
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
                            @foreach($tasks['tasks'] as $task)
                                @include('task.sections.tableRow',['task' => $task])
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
