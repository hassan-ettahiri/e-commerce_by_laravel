@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Ajouter promotion:</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('promotions/store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">% promotion:</label>
                        <input type="text" class="form-control" name="promotion_nom" id="promotion_nom">
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