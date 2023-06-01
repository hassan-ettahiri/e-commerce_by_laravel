@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>users page
        </h1>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>full name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->name.' '.$user->lname }}</th>
                        <th>{{ $user->email }}</th>
                        <th>{{ $user->phone }}</th>
                        <th>
                            <a href="{{ url('users/'.$user->id) }}" class="btn btn-primary" >detail</a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection