<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    #[Rule('required|min:2|max:50|string')]
    public $name = '';

    #[Rule('required|email|unique:users,email')]
    public $email = '';

    #[Rule('required|min:5')]
    public $password = '';

    public function createUser()
    {
        $data = $this->validate();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $this->reset('name', 'email', 'password');

        request()->session()->flash('success', 'User created');
    }

    public function render()
    {
        return view('livewire.clicker', [
            'users' => User::paginate(5)
        ]);
    }
}
