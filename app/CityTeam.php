<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CityTeam extends Model {

    protected $fillable = [
        'hotline',
        'team_email',
        'description',
        'status',
        'main_contact_id',
    ];

    public function contact()
    {
        return $this->belongsTo(User::class, 'main_contact_id');
    }

    /**
     * @return HasOne
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'city_id');
    }
}
