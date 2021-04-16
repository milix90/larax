@extends('layouts.app')
@section('title','Activation Error')
@section('content')
    @include('errors.errors')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Account Error</div>
                    <div class="card-body">Your account have not been activated yet. Please login later.</div>
                </div>
            </div>
        </div>
    </div>
@endsection
