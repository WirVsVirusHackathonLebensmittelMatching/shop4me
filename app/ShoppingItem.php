<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShoppingItem extends Model {

    protected $table = 'shopping_items';

    protected $fillable = [
        'item_name',
        'item_amount',
        'item_buy_similar',
        'item_not_buy',
        'shopping_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsTo
     */
    public function shopping(): BelongsTo
    {
        return $this->belongsTo(Shopping::class);
    }
}
