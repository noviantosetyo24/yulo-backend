@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(empty(request()->route('id')) ? 'Edit Profil' : 'Edit Pengguna') }}</div>
                <div class="card-body py-5">
                    @livewire('user.profil-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection