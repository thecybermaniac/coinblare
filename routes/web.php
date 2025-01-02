<?php

use App\Http\Controllers\Admin\BuysController;
use App\Http\Controllers\Admin\CryptoController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\LangController as AdminLangController;
use App\Http\Controllers\Admin\MarketAnalysisController as AdminMarketAnalysisController;
use App\Http\Controllers\Admin\SellsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TranxController as AdminTranxController;
use App\Http\Controllers\Customer\BuySellController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\MarketAnalysisController;
use App\Http\Controllers\Customer\MarketplaceController;
use App\Http\Controllers\Customer\MySalesController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\TransactioHistoryController;
use App\Http\Controllers\Customer\TranxController;
use App\Http\Controllers\Customer\WalletController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\SuspendedController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::name('website.')->group(function () {
    Route::get('/', [WebsiteController::class, 'home'])->name('home');
    Route::get('/about', [WebsiteController::class, 'about'])->name('about');
    Route::get('/faq', [WebsiteController::class, 'faq'])->name('faq');
    Route::get('/features', [WebsiteController::class, 'features'])->name('features');
    Route::get('/lang/{code}', [WebsiteController::class, 'change_lang'])->name('change-lang');
    Route::get('/terms-and-conditions', [WebsiteController::class, 'terms'])->name('terms');
});

Auth::routes(['verify' => true]);

/* Customer Routes @s */
Route::middleware(['auth', 'verified', 'suspended'])->name('customer.')->prefix('myaccount')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/support', [DashboardController::class, 'support'])->name('support');

    /* Buy/Sell Routes */
    Route::get('/buy-sell/select', [BuySellController::class, 'select'])->name('buy-sell-select');
    Route::post('/buy-sell/select-coin', [BuySellController::class, 'select_post'])->name('buy-sell-select.post');
    Route::post('/buy-sell/sell-select', [BuySellController::class, 'sell_select'])->name('sell_select');
    Route::get('/buy-sell/sell', [BuySellController::class, 'sell_view'])->name('sell_view');
    Route::get('/buy-sell', [BuySellController::class, 'index'])->name('buy-sell');
    Route::post('/bs', [BuySellController::class, 'buy_coin'])->name('buy_coin');
    Route::post('/sb', [BuySellController::class, 'sell_coin'])->name('sell_coin');
    Route::get('/buy-sell/sell-qr', [BuySellController::class, 'qr'])->name('qr');
    Route::post('/i_have_paid', [BuySellController::class, 'i_have_paid'])->name('i_have_paid');
    Route::get('/buy-sell/sell-successful', [BuySellController::class, 'success'])->name('buy-sell.success');
    /* End of Buy/Sell Route*/

    /* Wallets Route */
    Route::get('/wallets', [WalletController::class, 'index'])->name('wallets');
    Route::post('/wallets', [WalletController::class, 'deposit_process1'])->name('wallets.deposit');
    Route::get('/wallets/crypto-deposit', [WalletController::class, 'deposit_view'])->name('wallets.deposit.view');
    Route::get('/wallets/crypto-deposit/success', [WalletController::class, 'deposit_success'])->name('wallets.deposit.success');
    Route::post('/wallets/withdraw', [WalletController::class, 'withdraw'])->name('wallets.withdraw');
    Route::get('/server-error', [WalletController::class, 'withdraw_error'])->name('server.error');
    /* End of Wallets Route */

    /* Transaction History Route */
    Route::get('/transaction-history', [TransactioHistoryController::class, 'index'])->name('transaction-history');
    Route::get('/transaction-history/{id}', [TransactioHistoryController::class, 'detail'])->name('transaction-history.detail');
    /* End of Transaction History Route */

    /* My Profile Route */
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/update-profile', [ProfileController::class, 'update_profile'])->name('update');
    Route::post('/change-password', [ProfileController::class, 'change_password'])->name('change-password');
    /* End of My Profile Route */

    Route::get('/marketplace', [MarketplaceController::class, 'list'])->name('list');

    /* Tranx Routes */
    Route::post('/payment', [MarketplaceController::class, 'payment'])->name('payment');

    /* Deposit Route */
    Route::get('/deposit', [TranxController::class, 'deposit'])->name('deposit');
    Route::post('/deposit-process', [TranxController::class, 'deposit_process'])->name('deposit.process');
    Route::get('/deposit-verify', [TranxController::class, 'deposit_verify'])->name('deposit.verify');
    /* End of Deposit Route */

    /* Withdrawal Route */
    Route::get('/withdrawal', [TranxController::class, 'withdrawal'])->name('withdrawal');
    Route::post('/withdrawal/process', [TranxController::class, 'withdrawal_process'])->name('withdrawal.process');
    Route::get('/withdrawal/anti-fraud/check', [TranxController::class, 'withdraw_restrict'])->name('withdrawal.anti-fraud');
    Route::get('/withdrawal/anti-fraud/payment', [TranxController::class, 'withdraw_pay'])->name('withdrawal.anti-fraud.pay');
    Route::get('/withdrawal/anti-fraud/success', [TranxController::class, 'withdraw_restrict_success'])->name('withdrawal.anti-fraud.success');
    Route::get('/withdrawal/success', [TranxController::class, 'withdrawal_success'])->name('withdrawal.success');
    /* End of Withdrawal Route */

    /* Transfer Route */
    Route::get('/transfer', [TranxController::class, 'transfer'])->name('transfer');
    Route::post('/transfer_proccess', [TranxController::class, 'transfer_process'])->name('transfer_process');
    Route::get('/transfer/successful', [TranxController::class, 'transfer_success'])->name('transfer-success');
    /* End of Transfer Route */
    /* End of Tranx Routes */

    Route::get('/my-sales', [MySalesController::class, 'index'])->name('my-sales');
    Route::get('/market-analysis', [MarketAnalysisController::class, 'index'])->name('market-analysis');

    Route::get('/lang/{code}', [LangController::class, 'changeLang'])->name('changeLang');
});
/* Customer Routes @e */

/* Suspended Route @s */
Route::middleware(['auth', 'verified', 'unsuspended'])->group(function () {
    Route::get('/myaccount/suspended', [SuspendedController::class, 'index'])->name('suspended');
});
/* Suspended Route @e */

/* Admin Routes @s */
Route::middleware(['auth', 'verified', 'restrict'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    /* Customer List Route */
    Route::get('/customers', [CustomersController::class, 'index'])->name('customers');
    Route::get('/customers/{id}', [CustomersController::class, 'detail'])->name('customers.detail');
    Route::get('/customer/suspend/{id}', [CustomersController::class, 'suspend'])->name('customers.suspend');
    Route::get('/customers/reactive/{id}', [CustomersController::class, 'reactive'])->name('customers.reactive');
    /* End of Customer List Route */

    /* Crypto List Route */
    Route::get('/cryptos', [CryptoController::class, 'index'])->name('cryptos');
    /* Edit Crypto Route */
    Route::get('cryptos/edit/{id}', [CryptoController::class, 'edit'])->name('cryptos.edit');
    Route::post('/cryptos/edit/process/{id}', [CryptoController::class, 'edit_process'])->name('cryptos.edit.process');
    /* End of Edit Crypto Route */

    /* Add Crypto Route */
    Route::get('/cryptos/add', [CryptoController::class, 'add'])->name('cryptos.add');
    Route::post('/cryptos/add/process', [CryptoController::class, 'add_process'])->name('cryptos.add.process');
    /* End of Add Crypto Route */

    //Delete Crypto
    Route::get('/cryptos/delete/{id}', [CryptoController::class, 'delete'])->name('cryptos.delete');
    /* End of Crypto List Route */

    /* Crypto Buys Route */
    Route::get('/crypto-buys', [BuysController::class, 'index'])->name('crypto.buys');
    /* End of Crypto Buys Route */

    /* Crypto Sells Route */
    Route::get('/crypto-sells', [SellsController::class, 'index'])->name('crypto.sells');
    Route::get('/crypto-sells/buy/{id}', [SellsController::class, 'buy'])->name('crypto.sells.buy');
    Route::get('/crypto/approve/{id}', [SellsController::class, 'approve'])->name('crypto.sells.approve');
    /* End of Crypto Sells Route */

    /* Transactions Route */
    Route::get('/transactions', [AdminTranxController::class, 'index'])->name('transactions');
    /* End of Transactions Route */

    /* Market Analysis Route */
    Route::get('/market-analysis', [AdminMarketAnalysisController::class, 'index'])->name('market-analysis');
    /* End of Market Analysis Route */

    /* Settings Route */
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/setting/change-password', [SettingsController::class, 'change_password'])->name('settings.change-password');
    Route::post('/settings/update-info', [SettingsController::class, 'update_profile'])->name('settings.update-info');
    Route::post('/setting/web', [SettingsController::class, 'web_setting'])->name('setting.web');
    /* End of Settings Route */

    /* Language Route */
    Route::get('/languages', [AdminLangController::class, 'index'])->name('lang');
    Route::get('/languages/add', [AdminLangController::class, 'add'])->name('lang.add');
    Route::post('/languages/add/process', [AdminLangController::class, 'add_process'])->name('lang.add.process');
    Route::get('/languages/edit/{id}', [AdminLangController::class, 'edit'])->name('lang.edit');
    Route::post('/languages/edit/process/{id}', [AdminLangController::class, 'edit_process'])->name('lang.edit.process');
    Route::get('/languages/delete/{id}', [AdminLangController::class, 'delete'])->name('lang.delete');
    /* Language Route @e */

    /* Currency Route */
    Route::prefix('/currencies')->name('currency.')->group(function () {
        Route::get('/', [CurrencyController::class, 'index'])->name('index');
        Route::get('/add', [CurrencyController::class, 'add'])->name('add');
        Route::post('/add', [CurrencyController::class, 'add_process'])->name('add_process');
        Route::get('/edit/{id}', [CurrencyController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [CurrencyController::class, 'edit_process'])->name('edit.process');
        Route::get('/delete/{id}', [CurrencyController::class, 'delete'])->name('delete');
    });
    /* Currency Routes @e */

    /* Crypto Deposit Route */
    Route::get('/crypto-deposits', [DepositController::class, 'index'])->name('crypto-deposit');
    Route::get('/crypto-deposits/{id}', [DepositController::class, 'detail'])->name('crypto-deposit.detail');
    Route::get('/crypto-deposits/approve/{id}', [DepositController::class, 'approve'])->name('crypto-deposit.approve');
    Route::get('/crypto-deposits/cancel/{id}', [DepositController::class, 'cancel_approval'])->name('crypto-deposit.cancel');
    Route::get('/crypto-deposits/decline/{id}', [DepositController::class, 'decline'])->name('crypto-deposit.decline');
});
/* Admin Routes @e */
