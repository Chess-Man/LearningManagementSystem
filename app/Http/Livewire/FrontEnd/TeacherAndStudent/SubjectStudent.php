<?php

namespace App\Http\Livewire\FrontEnd\TeacherAndStudent;

use Livewire\Component;
use App\Models\ClassStudent;
use App\Models\Classes;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\teacher\TaskCreateNotification;
use Illuminate\Support\Facades\Notification;

class SubjectStudent extends Component
{
    use WithPagination;
    public $subject = null;
    public $showForm = false;
    public $student;

    public $name , $final_grade;
    public $search;

    public function render()
    {
        $id = $this->subject->id;
        
          
                // $student = Classes::find($id)
                // ->user()
                // ->where('name','like','%'. $this->search.'%')
                // ->latest()
                // ->get();
               
                $student = Classes::find($id)
                ->classstudent()
                ->latest()
                ->get();

        return view('livewire.front-end.teacher-and-student.subject-student', ['students' => $student]);
    }

    public function showForm()
    {
        $this->showForm = true ;  
      
    }

    public function hideForm()
    {
        $this->showForm = false ; 
      
    }

    public function edit(ClassStudent $student)
    {

        $this->showForm();
        $this->student = $student;

        $this->name = $student->user->name; 
        $this->final_grade = $student->final_grade; 
    }

    public function update()
    {
        
        $data =  $this->validate([
            'final_grade' => 'required|numeric|between:1,100',
        ]);
         
        $this->student->update($data);

        //Notification for ?
       
        $student = $this->student;

        $student_id = $student->user_id;
        
        $user = User::where('id' , $student_id)->get(); 
       
    
       //  message content
        $users = Auth::user();
        $user_name = $users->name;
        $subject_description = $this->subject->description;
        $subject_subject = $this->subject->subject;
        

        // $this->notify_at = ;
        $this->notifMessage=  $user_name .' return your grades at '  .$subject_subject .' '. $subject_description  ;
        Notification::send($user , new TaskCreateNotification($this->notifMessage));

        $this->hideForm();
        $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Grade updated successfully!']);
    }

}

