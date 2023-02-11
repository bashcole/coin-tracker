<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExchangePair extends Model
{
    use HasFactory;

    public function exchange(): BelongsTo
    {
        return $this->belongsTo(Exchange::class);
    }

    public function baseCurrency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'base_currency_id');
    }

    public function quoteCurrency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'quote_currency_id');
    }

    public function scopeAvailable($query)
    {
        return $query->whereHas('baseCurrency', function (Builder $query) {
            $query->active();
        })
            ->whereHas('quoteCurrency', function (Builder $query) {
                $query->active();
            })
            ->active();
    }
}
