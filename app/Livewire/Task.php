<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;
use Illuminate\Support\Collection;

use function PHPUnit\Framework\isNull;

class Task extends Component
{
    public $tasks = [];
    public $task;

    protected $rules = ['task.text' => 'required|max:40',];

    public function mount(): void
    {
        $this->tasks = TaskModel::all();
        $this->task = new TaskModel();

    }

    public function save()
    {
        $this->validate();

        $this->task->save();

        $this->mount();

        
    }

    public function delete($id)
    {
        $taskToDelete = TaskModel::find($id);

        if(!is_null($taskToDelete)) {
            $taskToDelete->delete();
            $this->mount();
        }
    }
    
    public function edit(TaskModel $task)
    {
        $this->task = $task;
    }
    
    public function done(TaskModel $task)
    {
        $task->update(['done' => !$task->done]);
        $this->mount();
    }

    public function render()
    {
        return view('livewire.task');
    }
}
