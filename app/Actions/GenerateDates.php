<?php

namespace App\Actions;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GenerateDates
{
    public static function do(int $timeframe, int $limit = 144): array
    {
        $startDate = Carbon::now()->setHour(0)->setMinutes(0)->setSeconds(0);
        $dates = [
            $startDate->format('Y-m-d H:i:s')
        ];
        for ($i = 0; $i < $limit; $i++) {
            $dates[] = $startDate->subMinutes($timeframe)->format('Y-m-d H:i:s');
        }
        return $dates;
    }
}
