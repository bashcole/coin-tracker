<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExchangePairResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'icon'       => $this->baseCurrency->getIcon(),
            'color'       => $this->baseCurrency->color,
            'logo'        => strtolower($this->baseCurrency->symbol) . '.svg',
            'name'        => $this->baseCurrency->name,
            'base_symbol' => $this->baseCurrency->symbol,
            'symbol'      => $this->symbol,
            'decimals'    => $this->baseCurrency->decimals,
            'ask'         => $this->ask
        ];
    }
}
