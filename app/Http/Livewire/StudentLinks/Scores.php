<?php

namespace App\Http\Livewire\StudentLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\StudentFile;
use App\Models\ClassStudent;
use Illuminate\Support\Facades\Auth;

class Scores extends Component
{
    public function render()
    {
        $id = Auth::id();
        
        $score = StudentFile::where('user_id' , $id)->get();
        return view('livewire.student-links.scores', ['scores' => $score]);
    }
}
