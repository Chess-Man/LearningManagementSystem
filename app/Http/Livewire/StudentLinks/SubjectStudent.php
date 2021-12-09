<?php

namespace App\Http\Livewire\StudentLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\ClassStudent;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubjectStudent extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteSubject'];
    public $show = false; 
    public $showList = false;
    public $subjectIdBeingRemoved;

    public $code;

    public function render()
    {
        $id = Auth::id();

        $student = User::find($id)->classstudent;
        return view('livewire.student-links.subject-student', ['students' => $student]);
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


        // 'email' => Rule::unique('users')->where(function ($query) {
        //     return $query->where('account_id', 1);
        // })
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
                 //dito na yung continuation nung code 
                $subject->code = $subject_code;
                $subject->classes()->associate($class_id);
                $subject->user()->associate($user_id);
                $subject->save();
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
}
