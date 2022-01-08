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
    public $question_id ; 
    public $next = 0 ;
    public $count ;
    public $result = false ; 
    public function mount(Test $test)
    {
        $this->test = $test ;
    }

    public function render() {
        $test = $this->test ;
        $test_id = $test->id; 
        $this->test_id = $test_id; 
    
        $user_id = Auth::id();
    
        $questions = Question::where('test_id' , $test_id)
        ->with([
            'response' => function ($q) use ($user_id) {
                $q->where('user_id', $user_id);
            }
         ])
        ->get();
    
        // test
        $next_value = 0;
    
        // test
    
        $count = count($questions); //bibilangin nito yung array ng $questions variable
        $this->count = $count ;
        
        foreach($questions as $key => $question) {
            if (count(($question->response)) > 0) {
                if (count($questions) >= $next_value) {
                    $next_value = count($questions) - 1;
                }
                else {
                    $next_value = $key + 1;
                }
    
                $this->next = $next_value;
               
                if($count > 0)
                {
                    $next_question = $questions[$this->next];
                }
    
                else 
                {
                    $next_question = 'empty';
                }
                 
                return view('livewire.front-end.student.student-quiz', ['next_question' => $next_question, 'question' => $questions,  'test' =>$test , 'count' => $count ]);
            }
            else {
                if (count($questions) >= $next_value) {
                    $next_value = count($questions) - 1;
                }
                else {
                    $next_value = $key + 1;
                }
                
                $this->next = $next_value;
    
                // test
               
                if($count > 0)
                {
                    $next_question = $questions[$this->next];
                }
    
                else 
                {
                    $next_question = 'empty';
                }
                 
                return view('livewire.front-end.student.student-quiz', ['next_question' => $next_question, 'question' => $questions,  'test' =>$test , 'count' => $count ]);
            }
            
        } 
    }

    public function submit($question_id)
    {
        // inputs
       
        $next = $this->next+1;
        $this->question_id = $question_id;
        if($next < $this->count)
        {
            
            $this->store();
            $this->next++;
        }
        else
        {
            $this->store();
            $this->result = true  ; 
           
        }
    
    }

    public function store()
    {
        $user = Auth::user();
        $user_id = $user->id;
        
        $count_existence = Response::where('user_id', $user_id)
                                   ->where('question_id', $this->question_id)
                                   ->count();

        // nakalimutan ko para san 
        // $choice = Response::where('user_id' , $user_id)
        //                    ->where('question_id', $this->question_id)
        //                    ->first();
        // if($choice == null) 
        // {

        // }    
        // else
        // {
        //     $answer = $choice->answer;
        // }           
      
            $validatedData = $this->validate([
                'answer' => 'required',
            ]);

            $response = Response::where('user_id' , $user);
            
            $response = new Response; 
    
            $response = $response->create([
                'answer' => $this->answer ,
                'user_id' => $user_id ,
                'question_id' => $this->question_id ,
            ]);
            $response->save();
            
            // question_number
            $question_number = $this->next; 
            $question2 = Question::where('id' , $this->question_id)->first(); 
            $question = $question2->update(['question_number' => $this->next]);
    }
    
}
