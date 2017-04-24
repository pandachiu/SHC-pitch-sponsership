<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 * @package App
 */
class Property extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
