<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ];

    protected $messages = [
        'name' => 'Nama tidak boleh kosong',
        'email' => 'Email tidak valid',
        'email.unique' => 'Email sudah terdaftar',
        'password' => 'Password minimal :min Karakter',
        'password.confirmed' => 'Konfirmasi Password tidak sesuai',
    ];

    public function register()
    {
        $validate = $this->validate();
        $validate['email_verified_at'] = now();
        (new \App\Http\Controllers\Auth\RegisterController)->create($validate);
        return redirect()->route('login');
    }

    public function create()
    {
        $this->rules['password'] = 'required|min:6';
        unset($this->messages['password.confirmed']);

        $validate = $this->validate();
        (new \App\Http\Controllers\Auth\RegisterController)->create($validate);
        return redirect()->route('login');
    }

    public function onUpdate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
