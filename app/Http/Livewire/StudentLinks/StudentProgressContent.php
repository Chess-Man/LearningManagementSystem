<?php

namespace App\Http\Livewire\StudentLinks;

use Livewire\Component;
use App\Models\StudentFile;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class StudentProgressContent extends Component
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

            $obj->correct = $correct ;
            $obj->wrong = $wrong ;

            return view('livewire.student-links.student-progress-content')->with('obj', json_encode($obj));
        }

        $obj->wrong = null ;
       
        return view('livewire.student-links.student-progress-content')->with('score', json_encode($obj));
    }
}
