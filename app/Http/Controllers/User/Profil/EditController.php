<?php

namespace App\Http\Controllers\User\Profil;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function delete(Request $request) 
    {
        if ($request->id == auth()->id()) {
            return 'Tidak bisa menghapus user sendiri';
        }

        try {
            $user = User::find($request->id);
            $user->delete();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        return $user;
    }
    
    public function resetPassword(Request $request) 
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ];

        $messages = [
            'email' => 'Email tidak valid',
            'password' => 'Password minimal :min Karakter',
            'password.confirmed' => 'Konfirmasi Password tidak sesuai',
        ];
        $validate = $request->validate($rules, $messages);

        try {
            if (!Auth::attempt(['email' => $request->email, 'password' => $request->password_old])) {
                return back()->withErrors(['form' => 'Password Lama Tidak Sesuai']);
            }

            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
        } catch (\Throwable $th) {
            return back()->withErrors(['form' => $th->getMessage()]);
        }
        return back()->with(['message' => 'Berhasil update password']);
    }

    public function verify(Request $request) 
    {
        $rules = [
            'password' => 'required|min:6|confirmed',
        ];
        $messages = [
            'password' => 'Password minimal 6 Karakter',
            'password.confirmed' => 'Konfirmasi Password tidak sesuai',
        ];
        $request->validate($rules, $messages);

        try {
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->email_verified_at = now();
            $user->save();
        } catch (\Throwable $th) {
            return back()->withErrors(['form' => $th->getMessage()]);
        }
        return redirect()->route('home');
    }
}
