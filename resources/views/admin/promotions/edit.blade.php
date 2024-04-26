@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Ajouter promotion:</h1>
        </div>
        <div class="card-body">
            <form action="{{ url('promotions/update/'.$promotion->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">% promotion:</label>
                        <input type="text" class="form-control" name="promotion_nom" value="{{ $promotion->promotion_nom }}"  id="categorie_nom">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">status:</label>
                        <input type="checkbox" {{ $promotion->status == "1" ? "checked" : "" }} name="status">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection