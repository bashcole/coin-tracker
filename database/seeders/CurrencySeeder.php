<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $currencies = [
            [
                'id' => '1',
                'name' => 'United States Dollar',
                'symbol' => 'USD',
                'decimals' => '2',
                'type' => 'fiat',
                'prime' => '1',
                'created_at' => now()
            ],
            [
                'id' => '2',
                'name' => 'Bitcoin',
                'symbol' => 'BTC',
                'decimals' => '8',
                'color' => 'rgba(247, 147, 26, 1)',
                'market_cap' => '600677953895',
                'circulating_supply' => '18591450',
                'prime' => '1',
                'type' => 'crypto',
                'created_at' => now()
            ],
            [
                'id' => '3',
                'name' => 'Ethereum',
                'symbol' => 'ETH',
                'decimals' => '8',
                'color' => 'rgba(113, 128, 150, 1)',
                'market_cap' => '119979772975',
                'circulating_supply' => '114127163',
                'type' => 'crypto',
                'created_at' => now()
            ],
            [
                'id' => '4',
                'name' => 'Litecoin',
                'symbol' => 'LTC',
                'decimals' => '8',
                'color' => 'rgba(190, 190, 190, 1)',
                'market_cap' => '10245655354',
                'circulating_supply' => '66245618',
                'type' => 'crypto',
                'created_at' => now()
            ],
            [
                'id' => '5',
                'name' => 'Ethereum Classic',
                'symbol' => 'ETC',
                'decimals' => '8',
                'color' => 'rgba(72, 187, 120, 1)',
                'market_cap' => '7646422733',
                'circulating_supply' => '18600863',
                'type' => 'crypto',
                'created_at' => now()
            ]
        ];

        foreach ($currencies as $currency) {
            # Insert the row
            DB::table('currencies')->insert($currency);
        }
    }
}
