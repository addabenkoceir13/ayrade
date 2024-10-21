<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        return view('content.Admin.Profile.index', compact('user'));
    }
}
