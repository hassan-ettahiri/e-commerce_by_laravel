<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';
    protected $fillable = [
        'cate_id',
        'prom_id',
        'produit_nom',
        'produit_prix',
        'status',
        'feature',
        'produit_quantite',
        'produit_mini_description',
        'produit_description',
        'produit_image',
        'produit_genre',
    ];


    public function category(){
        return $this->belongsTo(Categorie::class,'cate_id','id');
    }

    public function promotion(){
        return $this->belongsTo(Promotion::class,'prom_id','id');
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
}


