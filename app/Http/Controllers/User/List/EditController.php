<?php

namespace App\Http\Controllers\User\List;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function update(Request $request) 
    {
        try {
            $mail_exist = User::where('email', $request->email)->where('id', '!=', $request->id)->exists();
            if ($mail_exist) return 'Email tidak bisa di gunakan';

            $user = User::find($request->id);
            $user->name = $request->name ?? $user->name;
            $user->email = $request->email ?? $user->email;
            $user->avatar = $request->avatar ?? $user->avatar;
            $user->save();

        } catch (\Throwable $th) {
            return $th->getMessage();
        }

        return $user;
    }
}
