<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CityTeam extends Model {

    protected $fillable = [
        'hotline',
        'team_email',
        'description',
        'status',
        'city_id',
        'main_contact_id',
    ];

    public function contact()
    {
        return $this->hasOne(User::class, 'main_contact_id');
    }

    /**
     * @return HasOne
     */
    public function city(): HasOne
    {
        return $this->hasOne(City::class, 'city_id');
    }
}
