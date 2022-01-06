<?php

namespace App\Http\Livewire\FrontEnd\TeacherAndStudent;

use Livewire\Component;
use App\Models\User;
use App\Models\Classes;
use App\Models\StudentFile;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\PieChartModel; 

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
            'wrong' => "",
            'chart' => ""
        ];
        $user = User::where('id' , $user_id)->first();
        $user_name = $user->name;
        
        if ($count_existence > 0)
        {
            
            $score = StudentFile::where('user_id' , $user_id)->sum('points');
         
    
            $total = Task::whereHas('studentFile', function(Builder $query){
                $query->where('user_id' ,   $this->student);
            })->sum('points');

            // dd([$score, $total]);

            $correct = $score;
            $wrong =  $total - $score;

            $pieChartModel = 
            (new pieChartModel())
                ->setTitle($user_name)
                ->addSlice('correct', $correct, '#27cf54')
                ->addSlice('wrong', $wrong, '#f6ad55')
               
            ;

            return view('livewire.front-end.teacher-and-student.student-progress', compact('pieChartModel'));
        }
        // chart
        $pieChartModel = 
        (new pieChartModel())
            ->setTitle($user_name)
            ->addSlice('correct', 100, '#f6ad55')
            ->addSlice('wrong', 0, '#27cf54')
           
        ;
    
        return view('livewire.front-end.teacher-and-student.student-progress', compact('pieChartModel'));
    }

}

