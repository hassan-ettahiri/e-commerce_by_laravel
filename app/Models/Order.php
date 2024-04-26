<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'company',
        'address',
        'apartment',
        'zip',
        'city',
        'state',
        'country',
        'phone',
        'status',
        'message',
        'cardholder',
        'card_number',
        'card_type',
        'date_exp',
        'cvv',
        'total_price',
        'tracking_no',
    ];

    public function orderitems(){
        return $this->hasMany(OrderItem::class);
    }
}
