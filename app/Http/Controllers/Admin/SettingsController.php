<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{


    public function index()
    {
        $this->seo()->setTitle('Settings | Admin');
        $user = Auth::user();
        return view('admin.settings.index', compact('user'));
    }

    public function change_password(Request $request)
    {

        $rules = [
            'password' => 'required|confirmed',
            'current_password' => ['required', function ($field, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Incorrect Password');
                }
            }],
        ];

        $message = [
            'password.confirmed' => 'Confirm Password Unmatched',
            'password.required' => 'Enter Your New Password',
            'current_password.required' => 'Enter Your Current Password'
        ];

        $validated = Validator::make($request->all(), $rules, $message);

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
            $user = User::where('id', Auth::id())->first();
            $user->password = Hash::make($request['password']);
            $user->save();
            return Response::json([
                'status' => true,
                'redirect_url' => route('admin.settings')
            ], 200);
        }
    }

    public function update_profile(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
        ];

        $message = [
            'name.required' => 'Your Name is Required',
            'email.required' => 'Your Email is Required',
            'email.email' => 'Invalid Email Format'
        ];

        $validated = Validator::make($request->all(), $rules, $message);

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
            $user = User::where('id', Auth::id())->first();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->save();

            return Response::json([
                'status' => true,
                'redirect_url' => route('admin.settings')
            ], 200);
        }
    }


    public function web_setting(Request $request)
    {
        $rules = [
            'web_name' => 'required',
            'copyright' => 'required',
            'email' => 'required|email',
            'logo' => 'nullable',
            'favicon' => 'nullable',
            'restrict' => 'email'
        ];

        $validated = $request->validate($rules);


        if (request()->has('logo')) {
            $path = Storage::disk('mydisk')->put('settings', $request->file('logo'));
            $validated['logo'] = $path;
        }

        if (request()->has('favicon')) {
            $path = Storage::disk('mydisk')->put('settings', $request->file('favicon'));
            $validated['favicon'] = $path;
        }

        setting($validated)->save();

        return redirect()->back();
    }
}
