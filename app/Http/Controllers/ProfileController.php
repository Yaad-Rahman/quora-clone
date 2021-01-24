<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        

        return view('profile.index', [
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', [
            'user' => $user
        ]);
    }

}
