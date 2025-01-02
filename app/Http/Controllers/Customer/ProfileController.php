<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Proengsoft\JsValidation\Facades\JsValidatorFacade;

class ProfileController extends Controller
{

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
    ];

    public function password()
    {
        $rules = [
            'current_password' => ['required', function ($field, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Incorrect Password');
                }
            }],
            'password' => 'required',
            'password_confirmation' => 'required'
        ];
    }

    public function index()
    {
        $this->seo()->setTitle("My Profile");
        $user = Auth::user();
        $validator = JsValidatorFacade::make($this->rules);
        return view('customer.profile.index', compact(['user', 'validator']));
    }

    public function update_profile(Request $request)
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
            $user = User::where('id', Auth::id())->first();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->phone = $request['phone'];
            $user->save();

            return Response::json([
                'status' => true,
                'redirect_url' => route('customer.profile')
            ], 200);
        }
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
            'password.confirmed' => 'Confirm password unmatched'
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
                'redirect_url' => route('customer.profile')
            ], 200);
        }
    }
}
