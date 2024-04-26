@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>promotion page</h1>
            <hr>
        </div>
        <div class="card-body">
            <div style="text-align: right">
                <a href="{{ url('promotions/create') }}" class="btn btn-primary">ajouter promotion</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>% promotion</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promotion as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->promotion_nom }}%</th>
                            <th>
                                <a href="{{ url('promotions/edit/'.$item->id) }}" class="btn btn-primary" >editer</a>
                                <a href="{{ url('promotions/destroy/'.$item->id) }}" class="btn btn-danger">supprimer</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection