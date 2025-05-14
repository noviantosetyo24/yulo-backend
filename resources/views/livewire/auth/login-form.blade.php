<form wire:submit.prevent="login">
    <x-input rowclass="6" label="Email" type="email" wiremodel="email" wire:keydown="onUpdate"></x-input>
    <x-input rowclass="6" label="Password" type="password" wiremodel="password" wire:keydown="onUpdate"></x-input>
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group">
                <p>Tidak bisa login? <a href="{{ route('password.request') }}">Lupa kata sandi</a></p>
            </div>
        </div>
    </div>

    @error('email') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
    @error('password') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror
    @error('form') <x-alert rowclass="6" class="danger" :message="$message"></x-alert> @enderror

    <x-button rowclass="6" label="Login" type="submit" class="primary"></x-button>
</form>