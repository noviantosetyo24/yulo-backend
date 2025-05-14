@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi Akun Anda') }}</div>
                <div class="card-body">
                    <x-form method="POST" action="{{ route('user.verify') }}">
                        @csrf
                        <x-input rowclass="6" label="Password Baru" type="password" name="password" wire:keydown="onUpdate"></x-input>
                        <x-input rowclass="6" label="Konfirmasi Password Baru" type="password" name="password_confirmation" wire:keydown="onUpdate"></x-input>

                        @error('email') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
                        @error('password') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
                        @error('form') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror

                        <x-button rowclass="6" type="submit" class="primary" label="Simpan"></x-button>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
