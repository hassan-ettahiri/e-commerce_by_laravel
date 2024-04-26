@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>categorie page</h1>
            <hr>
        </div>
        <div class="card-body">
            <div style="text-align: right">
                <a href="{{ url('categories/create') }}" class="btn btn-primary">ajouter categorie</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nom categorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorie as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->categorie_nom }}</th>
                            <th>
                                <a href="{{ url('categories/edit/'.$item->id) }}" class="btn btn-primary" >editer</a>
                                <a href="{{ url('categories/destroy/'.$item->id) }}" class="btn btn-danger">supprimer</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection