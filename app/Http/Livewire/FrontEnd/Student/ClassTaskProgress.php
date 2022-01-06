<?php

namespace App\Http\Livewire\FrontEnd\Student;

use Livewire\Component;
use App\Models\StudentFile;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\PieChartModel; 

class ClassTaskProgress extends Component
{
    public function render()
    {
        $user_id = Auth::id();
        $count_existence = StudentFile::where('user_id' , $user_id)->count();
        
        $obj = (object)[
            'correct' => "",
            'wrong' => ""
        ];

        if ($count_existence > 0)
        {
            
            $score = StudentFile::where('user_id' , $user_id)->sum('points');
    
            $total = Task::whereHas('studentFile', function(Builder $query){
                $query->where('user_id' ,  Auth::id());
            })->sum('points');

            // dd([$score, $total]);

            $correct = $score;
            $wrong =  $total - $score;

            $pieChartModel = 
            (new pieChartModel())
                ->setTitle('My Learning Progress')
                ->addSlice('correct', $correct, '#27cf54')
                ->addSlice('wrong', $wrong, '#f6ad55')
               
            ;

            return view('livewire.front-end.student.class-task-progress', compact('pieChartModel'));
        }
                $pieChartModel = 
                (new pieChartModel())
                    ->setTitle($user_name)
                    ->addSlice('correct', 100, '#f6ad55')
                    ->addSlice('wrong', 0, '#27cf54')
                
                ;
            return view('livewire.front-end.student.class-task-progress' , compact('pieChartModel'));
        
    }
}

