<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BasketItem
 * @package App
 */
class BasketItem extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function basket()
    {
        return $this->belongsTo('App\Basket');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
