<?php

namespace App\Http\Livewire\FrontEnd\TeacherAndStudent;

use Livewire\Component;
use App\Models\User;
use App\Models\Classes;
use App\Models\StudentFile;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\teacher\TaskCreateNotification;
use Illuminate\Support\Facades\Notification;

class SubjectTaskView extends Component
{
    public Task $task;
    public $editTask;

    public $showForm = false;

    public function mount($task)
    {
        
        $this->task = $task;
    }

    public function render()
    {
        $task = $this->task->studentfile()->get();

        return view('livewire.front-end.teacher-and-student.subject-task-view', ['tasks' => $task]);
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
       
        $this->showForm = true;
        $this->editTask = $task;
        $this->points = $task->points;
    }

    public function update()
    {
        
             
        //Notification for ?
        // $code =  $this->subject->code;
        
        // $student = ClassStudent::where('code' , $code)->get();
       
        // $students_id = []; 
        // foreach($student as $id){
        //     $students_id[]= $id->user_id;
        // }
    
        // $user = User::findOrFail($students_id)->all(); 
       
       //  message content
        $users = Auth::user();
        $user_name = $users->name;
        $user_id = $this->editTask->user_id;
        $task_id = $this->editTask->task_id;
        $task = Task::where('id' , $task_id)->first();
        $task_name = $task->name;
        $classes_id = $task->classes_id;
        $classes = Classes::where('id' , $classes_id)->first();
        $classes_name = $classes->subject;
        $classes_description = $classes->description;

        $user = User::where('id' , $user_id)->get();


       
        // $this->notify_at = ;
        $this->notifMessage=  $user_name .' has return your score in '.$task_name. ' at '  .$classes_name . $classes_description  ;
        Notification::send($user , new TaskCreateNotification($this->notifMessage));


        $data =  $this->validate([

            'points' => 'required|numeric|between:0,' .$this->editTask->task->points,

        ]);
        
        $this->editTask->update($data);
   
        $this->doClose();
        
        $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Task updated successfully!']);
        $this->task->refresh();
        
    }

  

}
