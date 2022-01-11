<?php

namespace App\Http\Livewire\FrontEnd\TeacherAndStudent;

use Livewire\Component;
use App\Models\Test ;
use App\Models\TestResult ; 
use App\Models\Question ;

class QuizResponses extends Component
{
    public $test; 
    public $search;

    public function mount(Test $test)
    {
        $this->test = $test;
    }

    public function render()
    {
        $test_id = $this->test->id;
        $number_of_questions = Question::where('test_id' , $test_id)->count();
        $test_name = $this->test->quiz_name; 
        $test_results = TestResult::where('test_id' , $test_id)->get();
        // dd($test_id);
        return view('livewire.front-end.teacher-and-student.quiz-responses' , ['test_results' => $test_results ,'number_of_questions' => $number_of_questions ,'test_name' => $test_name]);
    }
}
