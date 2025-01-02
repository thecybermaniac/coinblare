<?php

namespace App\Http\Controllers\Customer;

use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\Support;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade;

class DashboardController extends Controller
{
    protected $rules = [
        'subject' => 'required',
        'content' => 'required'
    ];

    public function index()
    {
        $this->seo()->setTitle('Crypto Dashboard');
        $wallet = Wallet::where('user_id', Auth::id());
        $wall = Wallet::where('user_id', Auth::id())->orderBy('crypto_wallet')->limit(3)->get();
        $validator = JsValidatorFacade::make($this->rules);
        $transactions = TransactionHistory::where('user_id', Auth::id())->get();
        $history = TransactionHistory::where('user_id', Auth::id())->limit(3)->orderByDesc('id')->get();
        $buy = TransactionHistory::where('user_id', Auth::id())->where('method', 'buy')->limit(3)->orderByDesc('id')->get();
        $sell = TransactionHistory::where('user_id', Auth::id())->where('method', 'sell')->limit(3)->orderByDesc('id')->get();
        return view('customer.dashboard.index', compact(['wallet', 'wall', 'validator', 'history', 'buy', 'sell', 'transactions']));
    }


    public function support(Request $request)
    {
        $validated = Validator::make($request->all(), $this->rules);

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

            $user = User::where('user_type', 'admin')->get();
            //dd($request->all());
            request()->session()->put('subject', $request->subject);
            $subject = $request->subject;
            //dd($subject);
            $content = $request->content;
            Notification::send($user, new Support($subject, $content));

            return Response::json([
                'status' => true,
                'redirect_url' => route('customer.dashboard')
            ], 200);
        }
    }
}
