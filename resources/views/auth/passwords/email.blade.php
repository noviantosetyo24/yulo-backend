@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lupa Kata Sandi') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <x-input rowclass="6" label="Email" type="email" name="email"></x-input>
                        @error('email') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
                        <x-button rowclass="6" label="Kirim Email Reset Password" type="submit" class="primary"></x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
