<?php

namespace App\Http\Livewire\FrontEnd\Student;

use Livewire\Component;
use App\Models\ClassStudent;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;

class ClassTaskGrade extends Component
{
    public function render()
    {
        $id = Auth::id();

        $grade = ClassStudent::where('user_id', $id)
                                ->latest()
                                ->get();
                                
        return view('livewire.front-end.student.class-task-grade', ['grades'=> $grade]);
    }
}

