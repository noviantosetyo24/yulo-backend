<form wire:submit.prevent="register">
    <x-input rowclass="6" label="Nama" type="name" wiremodel="name" wire:keydown="onUpdate"></x-input>
    <x-input rowclass="6" label="Email" type="email" wiremodel="email" wire:keydown="onUpdate"></x-input>
    
    @guest
    <x-input rowclass="6" label="Password" type="password" wiremodel="password" wire:keydown="onUpdate"></x-input>
    <x-input rowclass="6" label="Konfirmasi Password" type="password" wiremodel="password_confirmation" wire:keydown="onUpdate"></x-input>
    @else
    <x-input rowclass="6" label="Default Password" type="password" wiremodel="password" wire:keydown="onUpdate"></x-input>
    @endguest

    @error('name') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
    @error('email') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
    @error('password') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
    @error('password_confirmation') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
    @error('form') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
    
    @guest
    <x-button rowclass="6" label="Daftar" type="submit" class="primary"></x-button>
    @else
    <x-button rowclass="6" label="Tambahkan" type="button" class="primary" :attr="['wire:click' => 'create']"></x-button>
    @endguest
</form>