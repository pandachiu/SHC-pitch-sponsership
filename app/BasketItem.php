<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BasketItem
 * @package App
 */
class BasketItem extends Model
{
    use SoftDeletes;

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
