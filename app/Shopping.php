<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shopping extends Model {

    protected $table = 'shoppings';
    protected $fillable = [
        'owner_id',
        'volunteer_id',
        'delivery_earliest_date',
        'delivery_latest_date',
        'delivery_from_time',
        'delivery_to_time',
        'delivery_location',
        'delivery_notes',
        'contact_phone_number',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'delivery_earliest_date',
        'delivery_latest_date',
    ];

    /**
     * @return HasMany
     */
    public function shopping_items(): HasMany
    {
        return $this->hasMany(ShoppingItem::class);
    }

    /**
     * @return BelongsTo
     */
    public function volunteer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'volunteer_id');
    }

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
