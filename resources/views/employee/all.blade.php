@extends('layouts.app')
@section('title','Users List')
@section('content')
    @include('errors.errors')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Users list : Admin & Employees
                        <span class="float-right">
                            <a href="{{route('home')}}" class="btn btn-primary">Back to Home</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Manage Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Join Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @include('employee.sections.tableRow',['employee' => $user])
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {!! $users->render() !!}
        </div>
    </div>
@endsection
