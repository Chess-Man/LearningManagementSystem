<?php

namespace App\Http\Livewire\FrontEnd\Student;

use Livewire\Component;
use App\Models\Test;
use App\Models\Question;
use App\Models\Response; 
use App\Models\TestResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \Illuminate\Session\SessionManager;

class StudentQuiz extends Component
{
    public $test ;
    public $answer ;
    public $test_id ; 
    public $question_id ; 
    public $next = 0 ;
    public $count ;
    public $result = false ; 
    public $score = 0  ;
    public $data ;
    public $number_of_times_hidden;
    

    public function mount(Test $test)
    {
        $this->test = $test ;
    }
    public function render() {
        
        $test = $this->test ;
        $test_id = $test->id; 
        $test_deadline = $test->deadline ;

        $this->test_id = $test_id; 
    
        $user_id = Auth::id();
        
        // result 
        $test_result = TestResult::where('user_id' , $user_id)->where('test_id' , $test_id)->first();


        $questions = Question::where('test_id' , $test_id)
        ->with([
            'response' => function ($q) use ($user_id) {
                $q->where('user_id', $user_id);
            }
         ])
        ->get();

        
        // test
    
        $count = count($questions); //bibilangin nito yung array ng $questions variable
        
        $this->count = $count ;

        $answered_questions = [];

        foreach ($questions as $key => $question) {
            if (count($question->response) > 0) {
                array_push($answered_questions, $question);                
            }
        }
        // result 
       

        // result end

        //count yung answered questions
        $count_answered_questions = count($answered_questions);
        if( $count > 0)
        {
            if ($count_answered_questions == 0) {
                $this->next = 0;
                $current_question = $questions[$this->next];
            }
            else if ($count_answered_questions >= $count) {
                $this->result = true; 
                $this->next = $count - 1;
                $current_question = $questions[$this->next];
                $this->next_question = 'empty';
                $this->current_question = $current_question;
            }
            else {
                $this->next = $count_answered_questions;
                $current_question = $questions[$this->next];
            }
        }
        else 
        {
            $current_question = false ;
        }

        return view('livewire.front-end.student.student-quiz', ['test_result'=> $test_result , 'question' => $current_question,  'test' => $test , 'count' => $count, 'result' => $this->result, 'next' => $this->next, 'questions' => $questions, 'answered_questions' => $answered_questions , 'test_deadline' => $test_deadline]);
    }

    public function submit($question_id )
    {
        // input
    
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
            $this->result = true; 
        }

        if($this->result == true)
        {
            $this->result();
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

            $question = Question::where('id' , $this->question_id)->first();
            $correct_answer = $question->correct_answer;

            // dd($this->answer);
            // dd($correct_answer);
            if($this->answer == $correct_answer)
            {
                $this->score++;
            }

            $response = Response::where('user_id' , $user);
            
            $response = new Response; 
    
            $response = $response->create([
                'answer' => $this->answer ,
                'user_id' => $user_id ,
                'question_id' => $this->question_id ,
               
            ]);
            $response->save();
    }

    public function result()
    {
      
        $user_id = Auth::id();
        $test_result = new TestResult; 
        $test_result = $test_result->create([
            'result' => $this->score,
            'user_id' => $user_id,
            'test_id' => $this->test_id,
            'log' => $this->number_of_times_hidden,
        ]);
    }

}