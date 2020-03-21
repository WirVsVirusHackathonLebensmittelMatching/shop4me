<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model {

    protected $fillable = [
        'country_code',
        'city_name',
        'zip_code',
        'state',
        'state_code',
        'province',
        'owner_id',
        'province_code',
        'lat',
        'lng',
    ];

    protected $table = 'cities';

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

}
