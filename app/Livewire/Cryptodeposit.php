<?php

namespace App\Livewire;

use App\Models\Cryptocurrency;
use App\Models\Deposit;
use App\Models\User;
use App\Notifications\Admin\CryptoDeposit as AdminCryptoDeposit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Cryptodeposit extends Component
{
    use WithFileUploads;

    #[Rule('required', message: 'Your wallet address is required')]
    public $address = "";

    #[Rule('required', message: 'Please upload your proof')]
    public $file;

    public function save()
    {
        $validated = $this->validate([
            'address' => 'required',
            'file' => 'required',
        ]);

        $path = $this->file->store('proof', 'mydisk');
        $crypto = Cryptocurrency::where('name', session()->get('crypto'))->first();

        $data = [
            'user_id' => Auth::id(),
            'amount' => session()->get('amount'),
            'value' => session()->get('amount') * $crypto->r_value,
            'crypto' => session()->get('crypto'),
            'abbr' => session()->get('crypto_abbr'),
            'address' => $validated['address'],
            'proof' => $path,
            'status' => 'pending'
        ];

        Deposit::create($data);
        
        $user = Auth::user();

        Notification::send(User::find(6), new AdminCryptoDeposit($data, $user));

        return redirect()->route('customer.wallets.deposit.success');
    }

    public function render()
    {
        return view('livewire.cryptodeposit');
    }
}
