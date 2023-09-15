<?php

namespace App\Livewire;

use App\Livewire\Forms\TodoForm;
use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    public $search;

    public TodoForm $form;

    public function store()
    {
        $this->validateOnly('form.name');

        $this->form->create();

        $this->resetPage();
    }

    public function edit($id)
    {
        $this->form->show($id);
    }

    public function update()
    {
        $this->validateOnly('form.updateName');

        $this->form->update();

        $this->form->resetCancel();
    }

    public function delete($id)
    {
        $this->form->destroy($id);
    }

    public function toggle($id)
    {
        $this->form->setCheckboxToggle($id);
    }

    public function resetEdit()
    {
        $this->form->resetCancel();
    }

    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(5)
        ]);
    }
}
