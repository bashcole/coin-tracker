<?php

namespace App\Adapters\Exchanges;

class BitfinexExchange implements Exchange
{
    protected string $url = 'https://api.bitfinex.com/v1/pubticker/';
    protected mixed $data;

    public function __construct($symbol)
    {
        $this->data = json_decode(file_get_contents($this->url . $symbol), true);
    }

    public function getAsk()
    {
        return $this->data['ask'];
    }

    public function getBid()
    {
        return $this->data['bid'];
    }
}
