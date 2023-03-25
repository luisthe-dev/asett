<?php

namespace App\Http\Controllers;

use App\Models\CryptoCurrency;
use App\Models\History;

class CryptoCurrencyController extends Controller
{

    public function index()
    {

        (new HistoryController)->index();

        $allCrypto = CryptoCurrency::all();

        foreach ($allCrypto as $crypto) {
            $allHistory = History::where(['crypto_id' => $crypto->id])->get();
            $allTime  = 0;
            $month = 0;
            $yesterday = 0;
            $today = 0;
            $crypto->history = $allHistory;
            $crypto->allTime = $allTime;
            $crypto->month = $month;
            $crypto->yesterday = $yesterday;
            $crypto->today = $today;
        }

        return view('home', ['allCrypto' => $allCrypto]);
    }
}
