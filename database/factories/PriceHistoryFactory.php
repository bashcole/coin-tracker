<?php

namespace Database\Factories;

use App\Models\ExchangePair;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PriceHistory>
 */
class PriceHistoryFactory extends Factory
{
    private Carbon $startDate;

    private int $iteration;
    private array $exchangePairs;

    public function __construct(
        $count = null,
        ?Collection $states = null,
        ?Collection $has = null,
        ?Collection $for = null,
        ?Collection $afterMaking = null,
        ?Collection $afterCreating = null,
        $connection = null,
        ?Collection $recycle = null
    ) {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);

        $this->startDate = Carbon::now()->setHour(0)->setMinutes(0)->setSeconds(0);
        $this->iteration = 0;
        $this->exchangePairs = ExchangePair::all()->pluck('id')->toArray();
    }


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ask = rand(1888, 19000);
        $bid = $ask - rand(0, 400);

        $created_at = $this->startDate->format('Y-m-d H:i:s');

        $pair_id = current($this->exchangePairs);

        next($this->exchangePairs);
        if (is_null(key($this->exchangePairs))) {
            reset($this->exchangePairs);
            $this->startDate->subMinutes(30);
        }

        $this->iteration++;

        return [
            'pair_id'    => $pair_id,
            'ask'        => $ask,
            'bid'        => $bid,
            'created_at' => $created_at
        ];
    }
}
