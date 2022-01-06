<?php

namespace App\Http\Livewire\FrontEnd\TeacherAndStudent;

use Livewire\Component;
use App\Models\User;
use App\Models\Test;
use App\Models\Classes;

class SubjectQuiz extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteQuiz'];
    public $quiz_name , $instruction , $duration , $number_of_questions ; 

    public $show = false ;
    public $subject = null; 
    public $search;
    public $quizIdBeingRemoved;

    public function render()
    {
        $id = $this->subject->id;
        $tests = Classes::find($id)
                        ->tests()
                        ->where('quiz_name' , 'like' , '%'  . $this->search.'%')
                        ->latest()
                        ->paginate(10);           

        return view('livewire.front-end.teacher-and-student.subject-quiz', ['tests' => $tests]);
    }

    public function showForm()
    {
        $this->dispatchBrowserEvent('showForm');
        $this->reset(['quiz_name' , 'duration' , 'number_of_questions', 'instruction' ,'show']);
        
    }

    public function hideForm()
    {
        $this->dispatchBrowserEvent('hideForm');
        $this->resetValidation();
    }

    public function create()
    {
        $validatedData = $this->validate([
            'quiz_name' => 'required',
            'duration' => 'required|numeric',
            'number_of_questions' => 'required|numeric'
        ]);

        $validatedData['instruction'] = $this->instruction;

        // dd($this->file);
        $subject = $this->subject;
        $file = Test::create($validatedData);
        $file->classes()->associate($subject);
        $file->save();
        $this->hideForm();
        $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Quiz added successfully!']);
    }

    public function edit(Test $quiz)
    {

        $this->dispatchBrowserEvent('showForm');
        $this->quiz_name = $quiz->quiz_name;
        $this->instruction = $quiz->instruction;
        $this->duration = $quiz->duration;
        $this->number_of_questions = $quiz->number_of_questions;
        $this->instructions = $quiz->instruction;
        $this->show = 'update';
    }

    public function update()
    {
        dd('here');
    }

    public function delete($id)
    {
        $this->quizIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }


    public function deleteQuiz()
    {
       $test = Test::findOrFail($this->quizIdBeingRemoved);
       $test->delete();
       $this->dispatchBrowserEvent('deleted', [ 'message' => 'File deleted successfully!']);
    }

}

