<?php

namespace App\Livewire;

use App\Livewire\Forms\UploadForm;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;

    public UploadForm $form;

    public function store()
    {
        $data = $this->validate();

        if ($this->form->image) {
            $data['image'] = $this->form->image->store('uploads', 'public');
        }

        $this->form->create($data);
        $this->form->image = '';

        request()->session()->flash('success', 'User created');
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
