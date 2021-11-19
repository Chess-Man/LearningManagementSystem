<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;

class SubjectTeacher extends Component
{
    public function render()
    {
        return view('livewire.teacher-links.subject-teacher');
    }

    public function showModal()
    {
       dd('here');
    }
}
