<?php

namespace App\Jobs;

use App\Adapters\Exchanges\Exchange;
use App\Models\ExchangePair;
use App\Models\PriceHistory;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncExchangePairs implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        \Log::error('Vafla');

        $pairs = ExchangePair::all();

        foreach ($pairs as $pair) {
            /** @var Exchange $exchange */
            $exchange = resolve(config('app.exchange.driver'), $pair->exchange_symbol);
            $pair->bid = $exchange->getBid();
            $pair->ask = $exchange->getAsk();
            $pair->save();

            $history = new PriceHistory();
            $history->pair_id = $pair->id;
            $history->ask = $exchange->getAsk();
            $history->bid = $exchange->getBid();
            $history->created_at = Carbon::now()->setMinutes(0)->setSeconds(0);
            $history->save();
        }
    }
}
