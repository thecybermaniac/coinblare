<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('Currencies | Admin');
        $currency = Currency::all();
        return view('admin.currency.index', compact('currency'));
    }

    public function add()
    {
        $this->seo()->setTitle('Add Currency | Admin');
        return view('admin.currency.add');
    }

    public function add_process(Request $request)
    {
        $rules = [
            'name' => 'required',
            'code' => 'required',
            'exchange_rate' => 'required'
        ];

        $validated = $request->validate($rules);

        Currency::create($validated);

        return redirect()->route('admin.currency.index');
    }

    public function edit($id)
    {
        $this->seo()->setTitle('Edit Currency | Admin');
        $currency = Currency::find($id);
        return view('admin.currency.edit', compact('currency'));
    }

    public function edit_process(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'code' => 'required',
            'exchange_rate' => 'required'
        ];

        $validated = $request->validate($rules);

        Currency::find($id)->update($validated);

        return redirect()->route('admin.currency.index');
    }

    public function delete($id)
    {
        $currency = Currency::find($id);
        $currency->delete();

        return redirect()->back();
    }
}
