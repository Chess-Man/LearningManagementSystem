<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;

class QuestionTeacher extends Component
{

    public $count_question = 1; 
    public $count_option = 1;
    
    public function render()
    {
        return view('livewire.teacher-links.question-teacher');
    }

    public function add_question()
    {
         $this->count_question++;
    }

    public function add_option()
    {
         $this->count_option++;
    }
}
