<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cryptocurrency;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade;

class WalletController extends Controller
{
    protected $rules = [
        'crypto' => 'required',
        'amount' => 'required'
    ];

    protected $message = [
        'crypto.required' => 'Please select a cryptocurrency',
        'amount.required' => 'Enter An Amount',
    ];

    protected $rules_with = [
        'crypto' => 'required',
        'amount' => 'required'
    ];


    public function index()
    {
        $this->seo()->setTitle('Wallets');
        $wallet = Wallet::where('user_id', Auth::id())->get();
        $crypto = Cryptocurrency::all();
        $validator = JsValidatorFacade::make($this->rules, $this->message);
        $validator2 = JsValidatorFacade::make($this->rules_with, $this->message);
        return view('customer.wallets.index', compact(['wallet', 'crypto', 'validator', 'validator2']));
    }

    public function deposit_process1(Request $request)
    {
        $validated = Validator::make($request->all(), $this->rules, $this->message);

        if ($validated->fails()) {
            return Response::json(
                array(
                    'status' => false,
                    'errors' => $validated->getMessageBag()->toArray()
                ),
                400
                //400 being the HTTP code for an invalid request.
            );
        }

        if ($validated->passes()) {

            $crypto = Cryptocurrency::where('name', $request['crypto'])->first();
            session()->put('crypto', $request['crypto']);
            session()->put('amount', $request['amount']);
            session()->put('crypto_abbr', $crypto->abbr);

            return Response::json([
                'status' => true,
                'redirect_url' => route('customer.wallets.deposit.view')
            ], 200);
        }
    }

    public function deposit_view()
    {
        $this->seo()->setTitle('Crypto Deposit');
        $crypto = Cryptocurrency::where('name', session()->get('crypto'))->first();
        return view('customer.wallets.deposit', compact(['crypto']));
    }

    public function deposit_success()
    {
        $this->seo()->setTitle('Crypto Deposit Successful');
        return view('customer.wallets.review');
    }

    public function withdraw(Request $request)
    {
        $validated = Validator::make($request->all(), $this->rules_with, $this->message);

        if ($validated->fails()) {
            return Response::json(
                array(
                    'status' => false,
                    'errors' => $validated->getMessageBag()->toArray()
                ),
                400
                //400 being the HTTP code for an invalid request.
            );
        }

        if ($validated->passes()) {

            return Response::json([
                'status' => true,
                'redirect_url' => route('customer.server.error'),
            ], 200);
        }
    }

    public function withdraw_error()
    {
        $this->seo()->setTitle('Server Error');
        return view('customer.wallets.error');
    }
}
