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
        'password' => 'Password minimal :min Karakter',
        'password.confirmed' => 'Konfirmasi Password tidak sesuai',
    ];

    public function getAllProperties()
    {
        return collect(get_object_vars($this));
    }

    public function register()
    {
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
