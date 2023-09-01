<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('list', compact('users'));
    }

    public function register()
    {
        return view('Register');
    }

    public function postRegister(Register $request)
    {
        $user = User::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer'
        ]);

        $user->markEmailAsVerified();

        return redirect()->route('user.login')->with('message', __('messages.customerCreateSucess'));
    }

    public function login()
    {
        return view('Login');
    }

    public function postLogin(Login $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user->role != 'customer') {
            return redirect()->back()->with('message', __('messages.useRoleIsNotAuthenticated'));
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('all.user.list')->with('message', __('messages.SucessfullyLogin'));
        } else {
            return redirect()->back()->with('message', __('messages.something'));
        }
    }
}
