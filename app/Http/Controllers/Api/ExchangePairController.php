<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExchangePairResource;
use App\Models\ExchangePair;
use Illuminate\Http\Request;

class ExchangePairController extends Controller
{
    public function index()
    {
        $pairs = ExchangePair::with('baseCurrency', 'quoteCurrency')->get();

        return ExchangePairResource::collection($pairs);
    }
}
