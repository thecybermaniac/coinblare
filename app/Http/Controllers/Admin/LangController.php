<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('Languages | Admin');
        $language = Language::all();
        $lang = Language::orderBy('language_name')->paginate(5);
        return view('admin.language.index', compact(['lang', 'language']));
    }

    public function add()
    {
        $this->seo()->setTitle('Add Language | Admin');
        return view('admin.language.add');
    }

    public function add_process(Request $request)
    {
        $rules = [
            'name' => 'required',
            'code' => 'required'
        ];

        $message = [
            'name.required' => 'Language Name Is Required',
            'code.required' => 'Language Code Is Required'
        ];

        $validated = $request->validate($rules, $message);

        $lang = new Language();
        $lang->language_name = $validated['name'];
        $lang->language_code = $validated['code'];
        $lang->save();

        return redirect()->route('admin.lang');
    }

    public function edit($id)
    {
        $this->seo()->setTitle('Edit Language | Admin');
        $lang = Language::find($id);
        return view('admin.language.edit', compact('lang'));
    }

    public function edit_process(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'code' => 'required'
        ];

        $message = [
            'name.required' => 'Language Name Is Required',
            'code.required' => 'Language Code Is Required'
        ];

        $validated = $request->validate($rules, $message);

        $lang = Language::find($id);
        $lang->language_name = $validated['name'];
        $lang->lang_code = $validated['code'];
        $lang->save();

        return redirect()->route('admin.lang');
    }

    public function delete($id)
    {
        $lang = Language::find($id);
        $lang->delete();

        return redirect()->back();
    }
}
