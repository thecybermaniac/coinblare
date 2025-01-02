<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cryptocurrency;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CryptoController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('Cryptos | Admin');
        $crypt = Cryptocurrency::all();
        $crypto = Cryptocurrency::orderBy('name')->paginate(5);
        return view('admin.cryptos.index', compact(['crypto', 'crypt']));
    }

    public function edit($id)
    {
        $this->seo()->setTitle('Crypto Edit | Admin');
        $crypto = Cryptocurrency::find($id);
        return view('admin.cryptos.edit', compact('crypto'));
    }

    public function edit_process($id, Request $request)
    {
        $rules = [
            'name' => 'required',
            'value' => 'required',
            'r_value' => 'required',
            'address' => 'required',
            'cap' => 'required',
            'abbr' => 'required',
        ];

        $message = [
            'name.required' => 'Enter Crypto Name',
            'value.required' => "Enter Crypto's Cryptobot Value",
            'r_value.required' => "Enter Crypto's Real Value",
            'address.required' => 'Enter Crypto Wallet Address',
            'cap.required' => 'Enter Crypto Market Cap',
            'abbr.required' => 'Enter Crypto Abbreviation',
            'img.required' => 'Choose Crypto Image'

        ];

        $validated = $request->validate($rules, $message);

        $crypto = Cryptocurrency::find($id);
        $crypto->name = $validated['name'];
        $crypto->abbr = $validated['abbr'];
        $crypto->value = $validated['value'];
        $increase =  $validated['r_value'] - $crypto->r_value;
        $crypto->r_value = $validated['r_value'];
        $crypto->address = $validated['address'];
        $crypto->cap = $validated['cap'];
        if (request()->has('img')) {
            $path = Storage::disk('mydisk')->put('crypto', $request['img']);
            $crypto->crypto_img = $path;
        }
        $crypto->save();

        $wallet = Wallet::where('crypto_wallet', $crypto->name)->first();
        if ($wallet->balance_in_crypto > 0 && $wallet->balance_in_currency > 0) {
            $wallet->balance_in_crypto = $wallet->balance_in_crypto + $increase / 10000000000;
            $wallet->balance_in_currency = $wallet->balance_in_currency + $increase / 10000000000 * $crypto->r_value;
        }
        $wallet->save();

        $user = User::where('id', '!=', 0)->get();
        foreach ($user as $ur) {
            if ($ur->balance > 0) {
                $ur->balance = $ur->balance + $increase / 10000000000 * $crypto->r_value;
            }
            $ur->save();
        }

        return redirect()->route('admin.cryptos');
    }


    public function add()
    {
        $this->seo()->setTitle('Add Cryptocurrency');
        return view('admin.cryptos.add');
    }

    public function add_process(Request $request)
    {
        $rules = [
            'name' => 'required',
            'value' => 'required',
            'r_value' => 'required',
            'address' => 'required',
            'cap' => 'required',
            'abbr' => 'required',
            'img' => 'required'
        ];

        $message = [
            'name.required' => 'Enter Crypto Name',
            'value.required' => "Enter Crypto's Cryptobot Value",
            'r_value.required' => "Enter Crypto's Real Value",
            'address.required' => 'Enter Crypto Wallet Address',
            'cap.required' => 'Enter Crypto Market Cap',
            'abbr.required' => 'Enter Crypto Abbreviation',
            'img.required' => 'Choose Crypto Image'

        ];

        $validated = $request->validate($rules, $message);

        $crypto = new Cryptocurrency();
        $crypto->name = $validated['name'];
        $crypto->abbr = $validated['abbr'];
        $crypto->value = $validated['value'];
        $crypto->r_value = $validated['r_value'];
        $crypto->address = $validated['address'];
        $crypto->cap = $validated['cap'];
        if (request()->has('img')) {
            $path = Storage::disk('mydisk')->put('crypto', $validated['img']);
            $crypto->crypto_img = $path;
        }
        $crypto->save();

        return redirect()->route('admin.cryptos');
    }

    public function delete($id)
    {
        $crypto = Cryptocurrency::find($id);
        $crypto->delete();

        return redirect()->back();
    }
}
