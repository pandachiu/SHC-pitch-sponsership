<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasketItem extends Model
{
    public function basket()
    {
        return $this->belongsTo('App\Basket');
    }

    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
