<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExchangePairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $pairs = [
            [
                'id' => '1',
                'exchange_id' => '1',
                'base_currency_id' => '2',
                'quote_currency_id' => '1',
                'symbol' => 'BTC-USD',
                'exchange_symbol' => 'BTCUSD',
                'ask' => '33000',
                'bid' => '34000',
                'ordering' => '1',
                'created_at' => now()
            ],
            [
                'id' => '2',
                'exchange_id' => '1',
                'base_currency_id' => '3',
                'quote_currency_id' => '1',
                'symbol' => 'ETH-USD',
                'exchange_symbol' => 'ETHUSD',
                'ask' => '1200',
                'bid' => '1250',
                'ordering' => '2',
                'created_at' => now()
            ],
            [
                'id' => '3',
                'exchange_id' => '1',
                'base_currency_id' => '4',
                'quote_currency_id' => '1',
                'symbol' => 'LTC-USD',
                'exchange_symbol' => 'LTCUSD',
                'ask' => '150',
                'bid' => '160',
                'ordering' => '3',
                'created_at' => now()
            ],
            [
                'id' => '4',
                'exchange_id' => '1',
                'base_currency_id' => '5',
                'quote_currency_id' => '1',
                'symbol' => 'ETC-USD',
                'exchange_symbol' => 'ETCUSD',
                'ask' => '400',
                'bid' => '420',
                'ordering' => '4',
                'created_at' => now()
            ]
        ];

        foreach ($pairs as $pair) {
            # Insert the row
            DB::table('exchange_pairs')->insert($pair);
        }
    }
}
