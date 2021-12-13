<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ClassTeacher extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteSubject'];
    public $show = false; 
    public $showList = false;

    public $description, $subject;

    public $subjectIdBeingRemoved;

    public $showSubject = false; 
    

    public function render()
    {
        $id  = Auth::id();
        // $subject = Subject::where('teacher_id' , $id)->get();
        $shown_subjects = User::find($id)->classes()->where('shown' , 1)->get();
        // dd($subject);
        $all_subjects = User::find($id)->classes;
        $teacher_subjects = (object)[
        'all_subjects' => [],
        'shown_subjects' => []
        ];

        $teacher_subjects ->shown_subjects = $shown_subjects;
        $teacher_subjects ->all_subjects = $all_subjects;

        return view('livewire.teacher-links.class-teacher', ['teacher_subjects' => $teacher_subjects ]);
    }

    public function doShow()
    {
       $this->show = true;
    }

    public function doClose()
    {
       $this->show = false;
    }

    public function create()
    {
        // dd($this->description);
        $user_id = Auth::id();
        //dito paste

            //dito ivavalidate kung meron nang presence nung class_id at user_id
            $count_existence = Classes::where('user_id', $user_id)
            ->where('subject', $this->subject)
            ->where('description', $this->description)
            ->count();

            if ($count_existence > 0) {
                // return 'User already belongs to this class';
                $this->doClose();
                $this->dispatchBrowserEvent('message', [ 'message' => "Class Already Exist!"]);
            }
            else {
                //dito na yung continuation nung code 
                $subject = new Classes;
                $code = Str::random(6);
                $subject = Classes::create([
                    'subject' => $this->subject,
                    'description' => $this->description,
                    'code' => $code ,
                ]);
                $subject->user()->associate($user_id);
                $subject->save();
        
                $this->doClose();
                $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Class addedd successfully!']);
            }
        //end
       
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
       $file = Classes::findOrFail($this->subjectIdBeingRemoved);
       $file->delete();
       $this->dispatchBrowserEvent('deleted', [ 'message' => 'File deleted successfully!']);
    }

    public function hideShow($value, $subject_id)
    {
        $subject = Classes::where('id', $subject_id)->first();
        $subject->shown = $value; 
        $subject->save();
    }

}
