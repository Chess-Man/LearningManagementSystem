<?php

namespace App\Http\Livewire\FrontEnd\Student;

use Livewire\Component;
use App\Models\User;
use App\Models\StudentFile;
use App\Models\ClassStudent;
use Illuminate\Support\Facades\Auth;

class ClassTaskScore extends Component
{
    public function render()
    {
        
        $id = Auth::id();
        
        $score = StudentFile::where('user_id' , $id)->get();
        return view('livewire.front-end.student.class-task-score', ['scores' => $score]);
    }
}

