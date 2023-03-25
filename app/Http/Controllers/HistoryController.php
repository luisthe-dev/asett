<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\CryptoCurrency;
use Illuminate\Support\Facades\Http;

class HistoryController extends Controller
{
    public function index()
    {

        $listing = Http::withHeaders([
            'Accepts' => 'application/json',
            'X-CMC_PRO_API_KEY' => '5cd1562d-7129-4194-8e48-62d7e1c21c7a'
        ])->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest');

        $allCrypto = CryptoCurrency::all();

        $myArray = array();

        foreach ($allCrypto as $crypto) {
            array_push($myArray, $crypto->crypto_currency);
        }

        $dataCrypto = array_filter($listing['data'], function ($crypto) use ($myArray) {
            return in_array($crypto['name'], $myArray);
        });

        foreach ($dataCrypto as $data) {

            if (History::where([
                'crypto_id' => CryptoCurrency::where(['crypto_currency' => $data['name']])->first()->id,
                'amount' => $data['quote']['USD']['price'],
                'last_updated' => $data['quote']['USD']['last_updated']
            ])->count() < 1) {
                $history = new History([
                    'crypto_id' => CryptoCurrency::where(['crypto_currency' => $data['name']])->first()->id,
                    'amount' => $data['quote']['USD']['price'],
                    'last_updated' => $data['quote']['USD']['last_updated']
                ]);

                $history->save();
            }
        }
    }
}
