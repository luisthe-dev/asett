<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CryptoCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $topCurrency = [
            ['crypto_currency' => 'Bitcoin', 'crypto_symbol' => 'BTC'],
            ['crypto_currency' => 'Ethereum', 'crypto_symbol' => 'ETH'],
            ['crypto_currency' => 'Tether USD', 'crypto_symbol' => 'USDT'],
            ['crypto_currency' => 'BNB', 'crypto_symbol' => 'BNB'],
            ['crypto_currency' => 'USD Coin', 'crypto_symbol' => 'USDC'],
            ['crypto_currency' => 'XRP', 'crypto_symbol' => 'XRP'],
            ['crypto_currency' => 'Cardano', 'crypto_symbol' => 'ADA'],
            ['crypto_currency' => 'Dogecoin', 'crypto_symbol' => 'DOGE'],
            ['crypto_currency' => 'Polygon', 'crypto_symbol' => 'MATIC'],
            ['crypto_currency' => 'Binance USD', 'crypto_symbol' => 'BUSD'],
        ];

        DB::table('crypto_currencies')->insert($topCurrency);
    }
}
