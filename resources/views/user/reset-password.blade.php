@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ubah Kata Sandi') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.password.update') }}">
                        @csrf

                        <x-input rowclass="6" label="Email" type="email" name="email"></x-input>
                        <x-input rowclass="6" label="Password Lama" type="password" name="password_old"></x-input>
                        <x-input rowclass="6" label="Password" type="password" name="password"></x-input>
                        <x-input rowclass="6" label="Konfirmasi Password" type="password" name="password_confirmation"></x-input>

                        @error('email') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
                        @error('password') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
                        @error('form') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
                        @if(session()->has('message')) <x-alert rowclass="6" class="success" :message="session('message')"></x-alert> @endif
    
                        <x-button rowclass="6" label="Ubah Password" type="submit" class="primary"></x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
