<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;
use App\Models\Test;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class QuestionTeacher extends Component
{

    public $count_question ; 
    public $count_option = 1;
    
    public $test_id ; 

    public $question;
    public $correct_answer;
    public $option_1 , $option;
    public $something;

    public function mount($test)
    {
        $this->test_id = $test; 
    }

    public function render()
    {
        $test_id = $this->test_id;
        $test = Test::where('id', $test_id)->first();
    
        $quiz_name = $test->quiz_name;
    
        $this->count_question = $test->number_of_questions;
        
      
        return view('livewire.teacher-links.question-teacher' , compact('quiz_name'));
    }

    public function next_question($formData)
    {
        $data = array($formData);
        dd($formData);
        $test_id = $this->test_id;
        $test = Test::where('id' , $test_id)->first();
        
        $validatedData = $this->validate([
            'question' => 'required',
            'correct_answer' => 'required'
           
        ]);

        
        $question = Question::create($validatedData);
        $question->tests()->associate($test);
        $question->save();
    
    }


}
