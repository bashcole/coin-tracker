<?php

namespace App\Http\Controllers\Api;

use App\Actions\GenerateDates;
use App\Http\Controllers\Controller;
use App\Http\Resources\PriceHistoryResource;
use App\Models\ExchangePair;
use App\Models\PriceHistory;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PriceHistoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param string $symbol
     * @param string $timeframe
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show(string $symbol, string $timeframe)
    {
        $dates = GenerateDates::do(config('app.timeframes')[$timeframe], 144);

        $history = PriceHistory::with('pair')
            ->whereHas('pair', function ($query) use ($symbol) {
                $query->where('symbol', $symbol);
            })
            ->whereIn('created_at', $dates)
            ->latest()
            ->get();

        return PriceHistoryResource::collection($history);
    }
}
