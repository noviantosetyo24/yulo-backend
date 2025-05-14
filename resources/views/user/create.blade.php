@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Tambahkan Pengguna') }}
                    <div class="btn-toolbar float-end">
                        <a href="{{ route('user.list') }}" class="btn btn-secondary"><< Kembali</a>
                    </div>
                </div>
                <div class="card-body py-5">
                    @livewire('auth.register-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection