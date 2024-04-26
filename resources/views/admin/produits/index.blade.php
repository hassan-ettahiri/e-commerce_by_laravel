@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>produit page</h1>
            <hr>
        </div>
        <div class="card-body">
            <div style="text-align: right">
                <a href="{{ url('produits/create') }}" class="btn btn-primary">ajouter produit</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>image</th>
                        <th>nom produit</th>
                        <th>categorie</th>
                        <th>genre</th>
                        <th>description</th>
                        <th>prix</th>
                        <th>promotion</th>
                        <th>Quantité</th>
                        <th>date d'ajoute</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produit as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <th>
                                <img src="{{ asset('storage/'.$item->produit_image) }}" width="75px" alt="{{ $item->produit_nom }}">
                            </th>
                            <th>{{ $item->produit_nom }}</th>
                            <th>{{ $item->category->categorie_nom }}</th>
                            <th>{{ $item->produit_genre }}</th>
                            <th>{{ $item->produit_mini_description }}</th>
                            <th>{{ $item->produit_prix }}</th>
                            <th>{{ $item->promotion->promotion_nom }}</th>
                            <th>{{ $item->produit_quantite }}</th>
                            <th>{{ $item->created_at }}</th>
                            <th>
                                <a href="{{ url('produits/edit/'.$item->id) }}" class="btn btn-primary" >editer</a>
                                <a href="{{ url('produits/destroy/'.$item->id) }}" class="btn btn-danger">supprimer</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection