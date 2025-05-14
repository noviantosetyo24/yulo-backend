<form wire:submit.prevent="simpan">
    <div class="row mb-5 justify-content-center">
        <div class="col-md-6 text-center">
            <img src="{{ asset_img($avatarPath) }}" class="rounded-circle" alt="Avatar" width="100" height="100">
        </div>
    </div>

    <x-input rowclass="6" label="Nama" type="text" wiremodel="name" wire:keydown="onUpdate"></x-input>
    <x-input rowclass="6" label="Email" type="email" wiremodel="email" wire:keydown="onUpdate"></x-input>
    <x-input rowclass="6" label="Ubah Foto Profil" type="file" wiremodel="avatar" wire:keydown="onUpdate" accept=".png,.jpg,.jpeg"></x-input>

    @error('email') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
    @error('avatar') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
    @error('form') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
    
    @if ($successMessage)
    <x-alert rowclass="6" class="success" :message="$successMessage"></x-alert>
    @endif
    
    <x-button rowclass="6" label="Simpan" type="submit" class="primary">
        @if ($isEditUser)
        <a href="{{ route('user.list') }}" class="btn btn-secondary">Kembali</a>
        @endif
    </x-button>
    
</form>