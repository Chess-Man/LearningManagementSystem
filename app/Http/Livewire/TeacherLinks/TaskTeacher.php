<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use App\Models\Task;
use App\Models\Classes;

class TaskTeacher extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteTask'];
    use WithFileUploads;
    public $show = false;

    public $subject = null;

    public $name, $instruction, $file;
    public $searchTerm;
    public $taskIdBeingRemoved;

    public function render()
    {
        $id = $this->subject->id;
        $task = Classes::find($id)
                         ->tasks()
                         ->where('name' , 'like' , '%'  . $this->searchTerm.'%')
                         ->latest()
                         ->paginate(2);
                
        return view('livewire.teacher-links.task-teacher', ['tasks' => $task]);
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
        $taskname = $this->file->storeAs('public/storage', $file);
        $validatedData['file_path'] = $taskname;
        $subject = $this->subject;
        $task = Task::create($validatedData);
        $task->classes()->associate($subject);
        $task->save();
        $this->doClose();

    }

    public function download($id)
    {
        $dl = Task::find($id);
        return Storage::download($dl->file_path);
    }

    public function view($id)
    {
        $dl = Task::find($id);
        return Storage::get($dl->file_path, $dl->task_name);
    }

    public function delete($id)
    {
        $this->taskIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteTask()
    {
       $file = Task::findOrFail($this->taskIdBeingRemoved);
       $file->delete();
       $this->dispatchBrowserEvent('deleted', [ 'message' => 'Task deleted successfully!']);
    }

}
