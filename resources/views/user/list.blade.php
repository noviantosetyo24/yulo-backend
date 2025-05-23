@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('List Pengguna') }}
                    <div class="btn-toolbar float-end">
                        <a href="{{ route('user.create') }}" class="btn btn-primary">+ Tambah Pengguna</a>
                    </div>
                </div>
                <div class="card-body py-5">
                    @livewire('user.list-table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection