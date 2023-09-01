<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login;
use App\Http\Requests\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('Admin.Register');
    }

    public function postRegister(Register $request)
    {
        $user = User::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        $user->markEmailAsVerified();

        return redirect()->route('admin.login')->with('message', __('messages.adminCreatedSucess'));
    }

    public function login()
    {
        return view('Admin.Login');
    }

    public function postLogin(Login $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user->role != 'admin') {
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
