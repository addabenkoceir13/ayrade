<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getLogin()
    {
        return view('content.Auth.login');
    }

    public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            if (auth()->user()->role == config('constant.ROLE.ADMIN')) {
                toastr()->success('successfully logged in');
                return redirect()->intended(RouteServiceProvider::ADMIN);
            } elseif (auth()->user()->role == config('constant.ROLE.USER')) {
                if (auth()->user()->status == config('constant.STATUS.INACTIVE')) {
                    Auth::logout();
                    toastr()->error("Your account is not activated");
                    return redirect()->back();
                } elseif (auth()->user()->status == config('constant.STATUS.ACTIVE')) {
                    toastr()->success('successfully logged in');
                    return redirect()->intended(RouteServiceProvider::USER);
                }
            }
        } else {
            toastr()->error("The email or password is incorrect");
            return redirect()->back();
        }

    }
}
