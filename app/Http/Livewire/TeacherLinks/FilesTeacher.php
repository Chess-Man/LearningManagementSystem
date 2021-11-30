<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\File;
use App\Models\Classes;

use Illuminate\Support\Facades\Storage;

class FilesTeacher extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteFile'];

    use WithFileUploads;
    use WithPagination;
    public $show = false;

    public $subject = null;

    public $name, $instruction, $file;
    public $searchTerm;
    public $fileIdBeingRemoved;
    public function render()
    {
        $id = $this->subject->id;
        $file = Classes::find($id)
                        ->files()
                        ->where('name' , 'like' , '%'  . $this->searchTerm.'%')
                        ->latest()
                        ->paginate(2);
        return view('livewire.teacher-links.files-teacher', ['files' => $file]);

        // $id = $this->subject->id;
        // $task = Classes::find($id)
        //                  ->tasks()
        //                  ->where('name' , 'like' , '%'  . $this->searchTerm.'%')
        //                  ->latest()
        //                  ->paginate(2);
                
        // return view('livewire.teacher-links.task-teacher', ['tasks' => $task]);
    }

    public function download($id)
    {
        $dl = File::find($id);
        return Storage::download($dl->file_path);
    }

    public function view($id)
    {
        $dl = File::find($id);
        return Storage::get($dl->file_path, $dl->file_name);
    }

    public function delete($id)
    {
        $this->fileIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteFile()
    {
       $file = File::findOrFail($this->fileIdBeingRemoved);
       $file->delete();
       $this->dispatchBrowserEvent('deleted', [ 'message' => 'File deleted successfully!']);
    }

    public function doShow()
    {
        $this->show = true;
    }

    public function doClose()
    {
        $this->show = false;
    }

    public function create()
    {

        $validatedData = $this->validate([
            'name' => 'required| max:50',
            'instruction' => 'required| max:100',
            'file' => 'required'
        ]);

        // dd($this->file);
        $file = $this->file->getClientOriginalName();
        $filename = $this->file->storeAs('public/storage', $file);
        $validatedData['file_path'] = $filename;
        $subject = $this->subject;
        $file = File::create($validatedData);
        $file->classes()->associate($subject);
        $file->save();
        $this->doClose();
    }


 
}
