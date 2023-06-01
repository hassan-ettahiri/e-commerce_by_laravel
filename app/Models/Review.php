<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;

class Review extends Model
{
    use HasFactory;
    
    protected $table = 'reviews';
    protected $fillable = [
        'rating',
        'comment',
        'prod_id',
    ];

    public function produits(){
        return $this->belongsTo(Produit::class,'prod_id','id');
    }
}
