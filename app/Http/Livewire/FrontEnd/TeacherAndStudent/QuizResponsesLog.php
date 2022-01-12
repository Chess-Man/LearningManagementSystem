<?php

namespace App\Http\Livewire\FrontEnd\TeacherAndStudent;

use Livewire\Component;
use App\Models\TestResult;
use App\Models\Question;
use App\Models\User;
use App\Models\Response;

class QuizResponsesLog extends Component
{
    public $testResult ; 

    public function mount(TestResult $result)
    {
        $this->testResult = $result ; 
    }

    public function render()
    {
        $test_id  = $this->testResult->test_id; 
        $user_id  = $this->testResult->user_id;
        $user = User::where('id' , $user_id)->first();
        $result = $this->testResult->result ;
        // $questions = Question::where('test_id' , $test_id)->get();
        // $responses = Response::where('user_id' , $user_id)->where('question_id' , $question_id)->count();
        $questions = Question::where('test_id' , $test_id)
        ->with([
            'response' => function ($q) use ($user_id) {
                $q->where('user_id', $user_id);
            }
         ])
        ->get();

        $count = count($questions);
        return view('livewire.front-end.teacher-and-student.quiz-responses-log' , ['questions' => $questions, 'user' => $user, 'result' => $result , 'count' => $count]);
    }
}
