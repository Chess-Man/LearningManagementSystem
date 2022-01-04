<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\Test;
use App\Models\Classes;

class QuizTeacher extends Component
{
    public $quiz_name , $instruction , $duration , $number_of_questions; 

    public $show = false ;
    public $subject = null; 
    public $searchTerm;

    public function render()
    {
        $id = $this->subject->id;
        $tests = Classes::find($id)
                        ->tests()
                        ->where('quiz_name' , 'like' , '%'  . $this->searchTerm.'%')
                        ->latest()
                        ->paginate(10);           

        return view('livewire.teacher-links.quiz-teacher', ['tests' => $tests]);
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
        $validatedData = $this->validate([
            'quiz_name' => 'required',
            'instruction' =>  'required',
            'duration' => 'required|numeric',
            'number_of_questions' => 'required|numeric'
        ]);

        // dd($this->file);
        $subject = $this->subject;
        $file = Test::create($validatedData);
        $file->classes()->associate($subject);
        $file->save();
        $this->doClose();
        $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Quiz added successfully!']);
    }
}
