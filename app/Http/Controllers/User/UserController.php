<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }

    public function __invoke(Request $request)
    {
        $user = auth()->user();
        return view('content.User.index', compact('user'));
    }
}
