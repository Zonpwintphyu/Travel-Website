<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Verifytoken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate(
            [
                'name' => 'required|string|max:255|unique:users,name,' . $user->id,
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                'password' => [
                    'nullable',
                    'string',
                    'min:6',
                    'confirmed',
                    function ($attribute, $value, $fail) use ($user) {
                        if (Hash::check($value, $user->password)) {
                            $fail('Please choose a different password than your current one.');
                        }
                    },
                ],
            ],
            [
                'name.unique' => 'The name must be your registration name.',
                'password.confirmed' => 'The new password and password confirmation do not match.',
            ],
        );

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully.');
    }

    public function verifyaccount()
    {
        return view('opt_verification');
    }

    public function useractivation(Request $request)
    {
        $get_token = $request->token;
        $get_token = Verifytoken::where('token', $get_token)->first();

        if ($get_token) {
            $get_token->is_activated = 1;
            $get_token->save();
            $user = User::where('email', $get_token->email)->first();
            $user->is_activated = 1;
            $user->save();
            $getting_token = Verifytoken::where('token', $get_token->token)->first();
            $getting_token->delete();
            return redirect('/home')->with('activated', 'Your account has been activated successfully');
        } else {
            return redirect('/verify-account')->with('incorrect', 'Your OTP is Invalid please check your email once');
        }
    }

    public function index()
    {
        $get_user = User::where('email', auth()->user()->email)->first();
        if ($get_user->is_activated == 1) {
            return view('homePage');
        } else {
            return redirect('/verify-account');
        }
    }
}
