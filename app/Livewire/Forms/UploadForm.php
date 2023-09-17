<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Rule;

class UploadForm extends Form
{
    #[Rule('required|min:2|max:50|string')]
    public $name;

    #[Rule('required|email|max:100|unique:users,email')]
    public $email;

    #[Rule('required|min:5')]
    public $password;

    #[Rule('nullable|sometimes|image|max:2048')]
    public $image;

    public function create($data)
    {
        $request = $this->all();
        $request['image'] = $data['image'];
        $request['password'] = bcrypt($data['form']['password']);

        User::create($request);

        $this->reset('name', 'email', 'password', 'image');
    }

}
