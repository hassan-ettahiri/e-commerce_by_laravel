@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Ajouter Produit:</h1>
    </div>
    <div class="card-body">
        <form action="{{ url('produits/store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">nom du produit:</label>
                    <input type="text" class="form-control" name="produit_nom" id="produit_nom">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">categorie:</label>
                    <select class="form-select" name="cate_id">
                        <option value="">select categorie</option>
                        @foreach ($categorie as $item)
                            <option value="{{ $item->id }}">{{ $item->categorie_nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Prix:</label>
                    <input type="text" class="form-control" name="produit_prix" id="produit_prix">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">promotion:</label>
                    <select class="form-select" name="prom_id">
                        <option value="">select promotion</option>
                        @foreach ($promotion as $promo)
                            <option value="{{ $promo->id }}">{{ $promo->promotion_nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">quantite:</label>
                    <input type="text" class="form-control" name="produit_quantite" id="produit_quantite">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">genre:</label>
                    <select class="form-select" name="produit_genre">
                        <option value="">select genre</option>
                        <option value="homme">homme</option>
                        <option value="femme">femme</option>
                        <option value="enfant">enfant</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">petit description:</label>
                    <textarea name="produit_mini_description" class="form-control" id="produit_mini_description" rows="3"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">description:</label>
                    <textarea name="produit_description" class="form-control" id="produit_description" rows="3"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">image:</label>
                    <input type="file" name="produit_image" id="produit_image">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="">status:</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="">feature:</label>
                    <input type="checkbox" name="feature">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection