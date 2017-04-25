<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Basket
 * @package App
 */
class Basket extends Model
{
    use SoftDeletes;

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

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($basket) {
            // before delete() method call this

            $basket->basketItem->each(function ($basketItem, $key) {
                $basketItem->delete();
            });
            // do the rest of the cleanup...
        });
    }
}
