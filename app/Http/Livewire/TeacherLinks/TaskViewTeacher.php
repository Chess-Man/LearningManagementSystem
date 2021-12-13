<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\Classes;
use App\Models\StudentFile;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskViewTeacher extends Component
{
    public Task $task;
    public $editTask;

    public $show = false;

    public function mount($task)
    {
        
        $this->task = $task;
    }

    public function render()
    {
        $task = $this->task->studentfile()->get();

        return view('livewire.teacher-links.task-view-teacher', ['tasks' => $task]);
    }

    public function download($id)
    {
        $dl = StudentFile::find($id);
        return Storage::download($dl->file_path);
    }

    public function doClose()
    {
        $this->show = false;
    }

    public function edit(StudentFile $task)
    {
       
        $this->show = true;
        $this->editTask = $task;
        $this->points = $task->points;
    }

    public function update()
    {
        
        $data =  $this->validate([

            'points' => 'required|numeric|between:0,' .$this->editTask->task->points,

        ]);
        
        $this->editTask->update($data);
        
        $this->doClose();
        
        $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Task updated successfully!']);
        $this->task->refresh();
        
    }
}
