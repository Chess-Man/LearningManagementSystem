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
    public function mount(Test $test)
    {
        $this->test = $test ;
    }

    public function render()
    {
        $test = $this->test ;
        $test_id = $test->id; 
        $this->test_id = $test_id; 
        
        $question = Question::where('test_id' , $test_id)->inRandomOrder()->get();
        $count = Question::where('test_id' , $test_id)->count();
        
        return view('livewire.front-end.student.student-quiz', compact('test' , 'question' ));
    }

    public function submit()
    {
        // inputs
        $user = Auth::user();
        $user_id = $user->id;
        $test_id = $this->test_id;

        $response = new Response; 

        $response = $response->create([
            'answer' => $this->answer ,
            'user_id' => $user_id ,
            'task_id' => $test_id 
        ]);

       
        $response->save();
    }
}
