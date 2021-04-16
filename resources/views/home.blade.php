@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tasks Snapshot</div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <div class="card-body">
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
                                        <select class="custom-select mr-sm-2 mt-3" id="inlineFormCustomSelect">
                                            <option hidden selected>Select user</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    @endif
                                    <button class="mt-4 btn btn-primary float-right">Create</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <label>
                                    <span class="badge badge-primary">Last Tasks</span>
                                </label>
                                <div class="alert alert-secondary" role="alert">
                                    This is a secondary alert—check it out!
                                </div>
                                <div class="alert alert-secondary" role="alert">
                                    This is a secondary alert—check it out!
                                </div>
                                <div class="alert alert-secondary" role="alert">
                                    This is a secondary alert—check it out!
                                </div>
                                <div class="alert alert-secondary" role="alert">
                                    This is a secondary alert—check it out!
                                </div>
                                <a href="{{route('task.all')}}" class="btn btn-success float-right">All Tasks</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
