<?php

namespace App\Http\Livewire\FrontEnd\TeacherAndStudent;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Classes;

class SubjectContent extends Component
{

    use WithFileUploads;
    public $show = 'task';

    public $file_name, $instruction, $file;

    public Classes $subject;

    public function mount($subject)
    {
        $this->subject = $subject;
    }

    public function render()
    {
        $subject = $this->subject;
        return view('livewire.front-end.teacher-and-student.subject-content', ['subjects' => $subject]);
    }

    public function task()
    {
        $this->show = 'task';
    }

    public function file()
    {
        
        $this->show = 'file';
    }

    public function quiz()
    {
        $this->show = 'quiz';
    }

    public function student()
    {
        $this->show = 'student';
    }
}
