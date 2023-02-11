<?php

namespace App\Jobs;

use App\Mail\PriceLimitReached;
use App\Models\ExchangePair;
use App\Models\PriceAlert;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessPriceAlerts implements ShouldQueue
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
        $pairs = ExchangePair::with('baseCurrency')->get()->mapWithKeys(function ($item) {
            return [$item['id'] => $item];
        })->all();

        $alerts = PriceAlert::all();

        foreach ($alerts as $alert) {
            $pair = $pairs[$alert->pair_id];
            if (bccomp($alert->limit, $pair['ask']) === 1) {
                Mail::to($alert->email)->send(new PriceLimitReached($alert->limit, $pair->baseCurrency->symbol));
                $alert->delete();
            }
        }
    }
}
