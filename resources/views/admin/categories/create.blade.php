@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Ajouter categorie:</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('categories/store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">nom de la categorie:</label>
                        <input type="text" class="form-control" name="categorie_nom" id="categorie_nom">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection