<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilForm extends Component
{
    use WithFileUploads;

    public $userData;
    public $email;
    public $id;
    public $name;
    public $avatar;
    public $avatarPath;
    public $successMessage;
    public $isEditUser = false;

    protected $rules = [
        'email' => 'required|email',
        'avatar' => 'nullable|image|max:1024',
    ];
    
    protected $messages = [
        'email' => 'Email tidak valid',
        'avatar.max' => 'Ukuran Maksimal Foto :max Kb',
    ];

    public function mount()
    {
        $this->id = request()->route('id') ?? Auth::user()->id;
        $this->userData = User::find($this->id);
        if (empty($this->userData)) return abort(404);
        
        if (!empty(request()->route('id'))) {
            $this->isEditUser = true;
        }
        
        $this->name = $this->userData->name;
        $this->email = $this->userData->email;
        $this->avatarPath = $this->userData->avatar;
    }

    public function simpan()
    {
        $this->validate();
        $this->successMessage = null;

        # upload
        $avatar_path = $this->uploadAvatar();
        $update_request = new Request([
            'id' => $this->userData->id,
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $avatar_path,
        ]);
        $update_action = (new \App\Http\Controllers\User\Profil\EditController)->update($update_request);
        if (is_string($update_action)) {
            $this->addError('form', $update_action);
            return;
        }

        $this->name = $update_action->name;
        $this->email = $update_action->email;
        $this->avatarPath = $update_action->avatar;
        $this->successMessage = 'Data Pengguna Berhasil Diperbarui';
    }

    private function uploadAvatar()
    {
        $filename = $this->userData->avatar;
        if ($this->avatar) {
            $filename = 'user-'.str()->random(10).'-'.$this->userData->id.'.'.$this->avatar->getClientOriginalExtension();
            $this->avatar->storeAs('', $filename);
        }

        return $filename;
    }

    public function onUpdate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.user.profil-form');
    }
}
