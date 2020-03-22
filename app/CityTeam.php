<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CityTeam extends Model {

    const STATUS = [0 => 'Entwurf', 1 => 'Online'];

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
        return $this->hasMany(City::class);
    }

    public function getStatus()
    {
        return self::STATUS[$this->status];
    }
}
