<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public function scopePrime($query)
    {
        return $query->where('prime', 1);
    }

    public function scopeFiat($query)
    {
        return $query->where('type', 'fiat');
    }

    public function scopeCrypto($query)
    {
        return $query->where('type', 'crypto');
    }

    public function isFiat(): bool
    {
        return $this->type === 'fiat';
    }

    public function isCrypto(): bool
    {
        return $this->type === 'crypto';
    }

    public function getIcon(): string
    {
        return asset('/img/currencies/'.strtolower($this->symbol).'.svg');
    }
}
