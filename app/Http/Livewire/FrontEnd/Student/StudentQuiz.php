<?php

namespace App\Http\Livewire\FrontEnd\Student;

use Livewire\Component;
use App\Models\Test;
use App\Models\Question;
use App\Models\Response; 
use Illuminate\Support\Facades\Auth;

class StudentQuiz extends Component
{
    public $test ;
    public $answer ;
    public $test_id ; 

    public $next = 0 ;
    public $count ;
    public function mount(Test $test)
    {
        $this->test = $test ;
    }

    public function render()
    {
        $test = $this->test ;
        $test_id = $test->id; 
        $this->test_id = $test_id; 

        $question = Question::where('test_id' , $test_id)->get();

        $count = Question::where('test_id' , $test_id)->count();
        $this->count = $count ;
        $next_question = $question[$this->next]; 

        return view('livewire.front-end.student.student-quiz', ['next_question' => $next_question, 'question' => $question,  'test' =>$test , 'count' => $count ]);
    }

    public function submit()
    {
        // inputs
        
        if($this->next < $this->count)
        {
            $this->next++;
            $user = Auth::user();
            $user_id = $user->id;
            $test_id = $this->test_id;
    
            $response = Response::where('user_id' , $user);

            $response = new Response; 
    
            $response = $response->create([
                'answer' => $this->answer ,
                'user_id' => $user_id ,
                'test_id' => $test_id 
            ]);
    
           
            $response->save();
        }
        else
        {
            dd('continuation');
        }
    
    }
}
