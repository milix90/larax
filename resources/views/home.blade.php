@extends('layouts.app')
@section('title',config('app.name'))
@section('content')
    @include('errors.errors')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tasks Snapshot</div>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <div class="card-body">
                                @include('task.sections.create')
                            </div>
                        </div>
                        <div class="col-md-8">
                            @include('task.sections.latest')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
