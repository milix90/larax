@extends('layouts.app')
@section('title','Task : '. $task->title)
@section('content')
    @include('errors.errors')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Title : {{$task->title}}
                        <span class="float-right">
                        <small>
                            {{ \Carbon\Carbon::parse($task->created_at)->format('Y-m-d h:i') }}
                        </small>
                        </span>
                    </div>
                    <div class="card-body">
                        Description : {!! $task->description !!}<br>
                        <a href="{{route('task.all')}}" class="mt-3 btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
