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
        'city_team_id',
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

    /**
     * @return BelongsTo
     */
    public function city_team(): BelongsTo
    {
        return $this->belongsTo(CityTeam::class, 'city_team_id');
    }

    /**
     * @return bool
     */
    public function hasOwner()
    {
        $readableAttribute = [0 => 'Ja', 1 => 'Nein'];
        $isEmpty = $this->getAttribute('city_team_id') > 0;
        if ($isEmpty)
        {
            return 'Ja';
        }

        return 'Nein';
    }
    
}
