<?php

namespace App\Http\Controllers\User\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;

class ViewController extends Controller
{
    public function profil()
    {
        return view('user.profil');
    }
    
    public function edit($id)
    {
        return view('user.profil', ['id', $id]);
    }

    public function resetPassword(Request $request)
    {
        $email = auth()->user()->email;
        return view('user.reset-password')->with(['email' => $email]);
    }
}
