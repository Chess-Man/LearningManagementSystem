<?php

namespace App\Http\Livewire\StudentLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\Classes;
use App\Models\StudentFile;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;

class TaskViewStudent extends Component
{
    public Task $task;
    public $file_path;
    use WithFileUploads;

    public function mount($task)
    {
        $this->task = $task;
    }

    public function render()
    {
         $task = $this->task->studentfile()->first();

        return view('livewire.student-links.task-view-student', ['tasks' => $task]);
    }

    public function create()
    {
        $validatedData = $this->validate([
            'file_path' => 'required',
        ]);
        $user = Auth::id();
        // dd($this->file);
        $filename = $this->file_path->getClientOriginalName();
        $task = $this->file_path->storeAs('public/storage', $filename);
        $validatedData['file_path'] = $task;
        $taskId = $this->task->id;
      
        $validatedData['task_id'] = $taskId;
        $task = StudentFile::create($validatedData);
        
        $task->user()->associate($user);
        // $task->task()->associate($task);
        $task->save();

    } 

}
