<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class ResetPasswordForm extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];
    
    protected $messages = [
        'email' => 'Email tidak valid',
        'password' => 'Password minimal :min Karakter',
    ];

    public function login()
    {
        $this->validate();
        // if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
        //     return redirect()->route('home');
        // }
        $this->addError('form', 'Email atau password tidak sesuai');
    }

    public function onUpdate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function render()
    {
        return view('livewire.auth.reset-password-form');
    }
}
