<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class ListTable extends Component
{
    public $userList;
    public $successMessage;

    public function mount()
    {
        $this->userList = User::get();
    }

    public function hapus($userId)
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->successMessage = null;

        $update_request = new Request([
            'id' => $userId,
        ]);
        $update_action = (new \App\Http\Controllers\User\Profil\EditController)->delete($update_request);
        if (is_string($update_action)) {
            $this->addError('form', $update_action);
            return;
        }

        $this->successMessage = 'Pengguna Berhasil Dihapus';
        $this->userList = User::get();
    }

    public function openEdit($userId)
    {
        return redirect()->route('user.edit', $userId);
    }

    public function onUpdate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.user.list-table');
    }
}
