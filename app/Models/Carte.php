<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produits;

class Carte extends Model
{
    use HasFactory;
    protected $table = 'cartes';
    protected $fillable = [
        'user_id',
        'prod_id',
        'prod_qty',
    ];

    public function produits(){
        return $this->belongsTo(Produit::class,'prod_id','id');
    }
}
