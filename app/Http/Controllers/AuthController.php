<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\WelcomeMail;
use App\Models\Verifytoken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        $formData = request()->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'same:confirm-password'],
            'confirm-password' => ['required', 'min:8'],
            'role' => ['required', Rule::in(['user', 'admin'])],
        ]);
        $user = User::create($formData);
        auth()->login($user);

        $validToken = rand(10, 100. . '2022');
        $get_token = new Verifytoken();
        $get_token->token = $validToken;
        $get_token->email = $formData['email'];
        $get_token->save();
        $get_user_email = $formData['email'];
        $get_user_name = $formData['name'];
        Mail::to($formData['email'])->send(new WelcomeMail($get_user_email, $validToken, $get_user_name));

        return redirect('/home')->with('success', 'Welcome Dear, ' . $user->name);
    }
    public function login()
    {
        return view('auth.login');
    }
    public function post_login()
    {
        $formData = request()->validate(
            [
                'email' => ['required', 'email', 'max:255', Rule::exists('users', 'email')],
                'password' => ['required', 'min:8', 'max:255'],
            ],
            [
                'email.required' => 'Need to fill your email address.',
                'password.min' => 'Password should be more than 8 characters.',
            ],
        );

        if (auth()->attempt($formData)) {
            if (auth()->user()->is_admin && auth()->user()->is_activated == 1) {
                return redirect('/posts')->with('success', 'Welcome back');
            } elseif (!auth()->user()->is_admin && auth()->user()->is_activated == 1) {
                return redirect('/posts')->with('success', 'Welcome back');
            } else {
                return redirect('/home');
            }
        } else {
            return redirect()
                ->back()
                ->withErrors([
                    'email' => 'User Credentials Wrong',
                ]);
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Good Bye');
    }
}
