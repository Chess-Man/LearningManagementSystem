<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ClassTeacher extends Component
{
    public $show = false; 

    public $description, $subject;

    public function render()
    {
        $id  = Auth::id();
        // $subject = Subject::where('teacher_id' , $id)->get();
        $subject = User::find($id)->classes;
        return view('livewire.teacher-links.class-teacher', ['subjects' => $subject]);
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
        $user = Auth::id();
        $subject = new Classes;
        $code = Str::random(6);
        $subject = Classes::create([
            'subject' => $this->subject,
            'description' => $this->description,
            'code' => $code ,
        ]);
        $subject->user()->associate($user);
        $subject->save();

        $this->doClose();
        session()->flash('message', 'Subject updated successfully');
    } 

}
