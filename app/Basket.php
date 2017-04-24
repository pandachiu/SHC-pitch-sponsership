<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Basket
 * @package App
 */
class Basket extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function basketItem()
    {
        return $this->hasMany('App\BasketItem');
    }
}
