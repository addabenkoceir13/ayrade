<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class AdminRegisterController extends Controller
{
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->middleware('guest');
        $this->users = $users;
    }

    public function getRegister()
    {
        return view('content.Auth.Admin.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->all() +  [
            'role' => config('constant.ROLE.ADMIN'),
            'status' => config(('constant.STATUS.ACTIVE')),
        ];
        $user = $this->users->create($data);

        if ($user) {
            toastr()->success('Account created successfully');
            toastr()->success('successfully logged in');
            auth()->login($user);
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }
        else {
            toastr()->error('Account creation failed');
            return redirect()->back()->withInput();
        }
    }
}
