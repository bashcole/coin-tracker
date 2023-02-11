<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PriceHistory extends Model
{
    use HasFactory;

    protected $table = "price_history";

    protected $fillable = ['created_at'];

    public function pair(): BelongsTo
    {
        return $this->belongsTo(ExchangePair::class);
    }
}
