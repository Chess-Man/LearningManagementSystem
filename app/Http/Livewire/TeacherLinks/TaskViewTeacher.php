<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\Classes;
use App\Models\StudentFile;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskViewTeacher extends Component
{
    public Task $task;

    public function mount($task)
    {
        
        $this->task = $task;
    }

    public function render()
    {
        $task = $this->task;
        // dd($this->task);
        return view('livewire.teacher-links.task-view-teacher', ['tasks' => $task]);
    }
}
