<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;

class FileUpload extends Component
{
    #[Rule('required|min:2|max:50|string')]
    public $name = '';

    #[Rule('required|email|unique:users,email')]
    public $email = '';

    #[Rule('required|min:5')]
    public $password = '';

    public function createUser()
    {
        $data = $this->validate();

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        $this->reset('name', 'email', 'password');

        request()->session()->flash('success', 'User created');
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
