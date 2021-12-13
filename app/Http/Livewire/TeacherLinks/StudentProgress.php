<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\Classes;
use App\Models\StudentFile;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class StudentProgress extends Component
{
    public $student;
    public $editTask;

    public function mount($student)
    {
        $this->student = $student;
    }
    public function render()
    {
        $user_id = $this->student;
    
        $count_existence = StudentFile::where('user_id' , $user_id)->count();
        $obj = (object)[
            'correct' => "",
            'wrong' => ""
        ];

        if ($count_existence > 0)
        {
            
            $score = StudentFile::where('user_id' , $user_id)->sum('points');
    
            $total = Task::whereHas('studentFile', function(Builder $query){
                $query->where('user_id' ,   $this->student);
            })->sum('points');

            // dd([$score, $total]);

            $correct = $score;
            $wrong =  $total - $score;

            $obj->correct = $correct ;
            $obj->wrong = $wrong ;

            return view('livewire.teacher-links.student-progress')->with('obj', json_encode($obj));
        }
        $obj->wrong = 0 ;
        $obj->correct = 100 ;
        return view('livewire.teacher-links.student-progress')->with('obj', json_encode($obj));
    }

}
