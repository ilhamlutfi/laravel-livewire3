<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Todo;
use Livewire\Attributes\Rule;

class TodoForm extends Form
{
    public $todoID;

    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|min:3|max:50')]
    public $updateName ;

    public function create()
    {
        Todo::create($this->only('name'));

        $this->reset();
        request()->session()->flash('success', 'Created');
    }

    public function update()
    {
        Todo::find($this->todoID)->update(['name' => $this->updateName]);
    }

    public function destroy($id)
    {
        try {
            Todo::findOrFail($id)->delete();
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to delete todo');
            return;
        }
    }

    public function setCheckboxToggle($id)
    {
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function show($id)
    {
        $this->todoID = $id;
        $this->updateName = Todo::find($id)->name;
    }

    public function resetCancel()
    {
        $this->reset('todoID', 'updateName');
    }
}
