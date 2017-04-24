<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PitchSection
 * @package App
 */
class PitchSection extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function property()
    {
        return $this->hasMany('App\Property');
    }
}
