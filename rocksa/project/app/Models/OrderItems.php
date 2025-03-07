<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = [
        'order_id',
        'rock_id',
        'price',
        'quantity',
    ];

    public function order()
    {

        return $this-> belongsTo(Order::class);

    }

    public function rocks(){

        return $this -> belongsTo(Rock::class, 'rock_id');

    }


}
