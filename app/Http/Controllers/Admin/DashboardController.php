<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cryptocurrency;
use App\Models\Deposit;
use App\Models\SaleOrder;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('Admin Dashboard');
        $sell = SaleOrder::where('address', '!=', 'sold through wallet')->get();
        $deposit = Deposit::all();
        $rev = Admin::all();
        $revenue = $sell->sum('price') + $deposit->sum('value') + $rev->sum('total_revenue');
        $users  = User::where('email', '!=', "admin@admin.com")->orderByDesc('id')->limit(4)->get();

        // create default cryptos
        $cryptos = array(
            [
                "name" => "bitcoin",
                "crypto_img" => "crypto/bitcoin.png",
                "value" => rand(00000, 999999),
                "address" => Str::random(20),
                "abbr" => "BTC",
                "r_value" => rand(00000, 999999),
                "cap" => rand(0000000, 99999999),
            ],
            [
                "name" => "ethereum",
                "crypto_img" => "crypto/ethereum.png",
                "value" => rand(00000, 999999),
                "address" => Str::random(20),
                "abbr" => "ETH",
                "r_value" => rand(00000, 999999),
                "cap" => rand(0000000, 99999999),
            ],
            [
                "name" => "tether",
                "crypto_img" => "crypto/tether.png",
                "value" => rand(00000, 999999),
                "address" => Str::random(20),
                "abbr" => "USDT",
                "r_value" => rand(00000, 999999),
                "cap" => rand(0000000, 99999999),
            ],
            [
                "name" => "binance coin",
                "crypto_img" => "crypto/bnb.png",
                "value" => rand(00000, 999999),
                "address" => Str::random(20),
                "abbr" => "BNB",
                "r_value" => rand(00000, 999999),
                "cap" => rand(0000000, 99999999),
            ]
        );

        foreach ($cryptos as $crypto) {
            $exists = Cryptocurrency::where("name", $crypto)->first();
            if (!$exists) {
                Cryptocurrency::create($crypto);
            }
        }

        return view('admin.dashboard.index', compact(['revenue', 'users', 'deposit', 'sell', 'rev']));
    }
}
