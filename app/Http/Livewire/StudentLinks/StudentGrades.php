<?php

namespace App\Http\Livewire\StudentLinks;

use Livewire\Component;
use App\Models\ClassStudent;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;

class StudentGrades extends Component
{
    public function render()
    {
        $id = Auth::id();

        $grade = ClassStudent::where('user_id', $id)
                                ->latest()
                                ->get();
                                
        return view('livewire.student-links.student-grades', ['grades'=> $grade]);
    }
}
