<?php

namespace App\Http\Controllers;

use App\Models\CryptoCurrency;
use App\Models\History;
use Carbon\Carbon;

class CryptoCurrencyController extends Controller
{

    public function convertDate($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
    }

    public function index()
    {

        (new HistoryController)->index();

        $allCrypto = CryptoCurrency::all();
        $todayDate = Carbon::now();

        foreach ($allCrypto as $crypto) {
            $allHistory = History::where(['crypto_id' => $crypto->id])->get();
            $todayHistory = History::where(['crypto_id' => $crypto->id, ['created_at', 'like', '%' . $todayDate->format('Y-m-d') . '%']])->get();
            $beforeHistory = History::where(['crypto_id' => $crypto->id, ['created_at', 'like', '%' . $todayDate->addDays(-1)->format('Y-m-d') . '%']])->get();
            $allTime  = 0;
            $allTimeCount = 0;
            $today = 0;
            $todayCount = 0;
            $yesterday = 0;
            $yesterdayCount = 0;
            $month = 0;

            foreach ($allHistory as $history) {
                $allTime = $allTime + $history->amount;
                $allTimeCount = $allTimeCount + 1;
            }

            if ($allTimeCount > 0) $allTime = $allTime / $allTimeCount;

            foreach ($todayHistory as $history) {
                $today = $today + $history->amount;
                $todayCount = $todayCount + 1;
            }
            if ($todayCount > 0) $today = $today / $todayCount;

            foreach ($beforeHistory as $history) {
                $yesterday = $yesterday + $history->amount;
                $yesterdayCount = $yesterdayCount + 1;
            }
            if ($yesterdayCount > 0) $yesterday = $yesterday / $yesterdayCount;

            $crypto->history = $allHistory;
            $crypto->allTime = $allTime;
            $crypto->month = $month;
            $crypto->yesterday = $yesterday;
            $crypto->today = $today;
        }

        return view('home', ['allCrypto' => $allCrypto]);
    }
}
