<?php

namespace App\Adapters\Exchanges;

interface Exchange
{
    public function getAsk();
    public function getBid();
}
