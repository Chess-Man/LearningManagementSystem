<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;
use App\Models\File;

class FileViewTeacher extends Component
{

    public File $file;

    public function mount($file)
    {
        $this->file = $file;
    }

    public function render()
    {
        $id= $this->file->id;
        $file = File::find($id);
        return view('livewire.teacher-links.file-view-teacher', ['files' => $file]);
    }

}
