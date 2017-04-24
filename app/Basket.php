<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Basket
 * @package App
 */
class Basket extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function basketItem()
    {
        return $this->hasMany('App\BasketItem');
    }
}
