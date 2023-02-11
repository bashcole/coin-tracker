<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'icon' => $this->getIcon(),
            'name' => $this->name,
            'color' => $this->color,
            'decimals' => $this->decimals,
            'market_cap' => $this->market_cap,
            'circulating_supply' => $this->circulating_supply,
            'symbol' => $this->symbol,
        ];
    }
}
