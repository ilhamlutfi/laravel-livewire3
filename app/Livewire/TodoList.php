<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $name;

    public $search;

    public $todoID;

    #[Rule('required|min:3|max:50')]
    public $updateName;

    public function store()
    {
        $data = $this->validateOnly('name');

        Todo::create($data);

        $this->reset('name');

        request()->session()->flash('success', 'Created');

        $this->resetPage();
    }

    public function edit($id)
    {
        $this->todoID = $id;
        $this->updateName = Todo::find($id)->name;
    }

    public function update()
    {
        $this->validateOnly('updateName');

        Todo::find($this->todoID)->update(['name' => $this->updateName]);

        $this->resetEdit();
    }

    public function delete($id)
    {
        try {
            Todo::findOrFail($id)->delete();
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to delete todo');
            return;
        }
    }

    public function toggle($id)
    {
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function resetEdit()
    {
        $this->reset('todoID', 'updateName');
    }

    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(5)
        ]);
    }
}
