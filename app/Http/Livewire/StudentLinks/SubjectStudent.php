<?php

namespace App\Http\Livewire\StudentLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\ClassStudent;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Notifications\teacher\TaskCreateNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\WithFileUploads;

class SubjectStudent extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteSubject'];
    public $show = false; 
    public $showList = false;
    public $subjectIdBeingRemoved;

    public $code;
    public $notifMessage;

    public function render()
    {
        $id = Auth::id();

        $shown_subjects = User::find($id)->classstudent()->where('shown' , 1)->get();
        $all_subjects = User::find($id)->classstudent;
        $student_subjects = (object)[
            'all_subjects' => [],
            'shown_subjects' => []
            ];
        $student_subjects->shown_subjects = $shown_subjects;
        $student_subjects->all_subjects = $all_subjects;
        return view('livewire.student-links.subject-student', ['student_subjects' => $student_subjects]);
    }

    public function doShow()
    {
        $this->show = true;
    }

    public function doClose()
    {
        $this->show = false; 
        $this->reset();
    }

    public function join()
    {
        // return 'test';
        $subject = new ClassStudent;
        $user_id = Auth::id();
    
        $class = Classes::where('code' , $this->code)->first();

            $this->validate([
                'code' => 'required|exists:classes,code' 
            ]);

            $class_id = $class->id;
            $subject_code = $class->code;

            //dito ivavalidate kung meron nang presence nung class_id at user_id
            $count_existence = ClassStudent::where('user_id', $user_id)
            ->where('classes_id', $class_id)
            ->count();

            if ($count_existence > 0) {
                // return 'User already belongs to this class';
                $this->doClose();
                $this->dispatchBrowserEvent('message', [ 'message' => "You've already joined this subject !"]);
            }
            else {
                $subject->code = $subject_code;
                $subject->classes()->associate($class_id);
                $subject->user()->associate($user_id);
                $subject->save();

                 //Notification for ?
                $classes =  Classes::where('code' , $this->code)->first();
                $teacher_id = $classes->user_id;
                
            
                $user = User::where('id' , $teacher_id)->get(); 
                
                //  message content
                $users = Auth::user();
                $user_name = $users->name;

                $subject_description = $classes->description;
                $subject_subject = $classes->subject;
                
                // $this->notify_at = ;
                $this->notifMessage=  $user_name .' has joined in '  .$subject_subject . $subject_description  ;
                Notification::send($user , new TaskCreateNotification($this->notifMessage));
               
                $this->doClose();
                $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Joined successfully!']);
            }
           
    }

    public function doShowList()
    {
        $this->showList = true;
    }
    public function doCloseList()
    {
        $this->showList = false;
    }

    public function delete($id)
    {
        $this->subjectIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteSubject()
    {
       $file = ClassStudent::findOrFail($this->subjectIdBeingRemoved);
       $file->delete();
       $this->dispatchBrowserEvent('deleted', [ 'message' => 'File deleted successfully!']);
    }

    public function hideShow($value, $subject_id)
    {
        $subject = ClassStudent::where('id', $subject_id)->first();
        $subject->shown = $value; 
        $subject->save();
    }
}
