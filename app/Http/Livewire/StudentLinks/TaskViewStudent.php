<?php

namespace App\Http\Livewire\StudentLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\Classes;
use App\Models\StudentFile;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

use Livewire\WithFileUploads;

class TaskViewStudent extends Component
{

    protected $listeners = ['deleteConfirmed' => 'delete'];
    public $task;
    public $file_path;
    public $file_count;
    public $count;
    public $student_file_being_removed;
    use WithFileUploads;

    public function mount($task)
    {
        $this->task = $task;
    }

    public function render()
    {
        
         $taskId = $this->task;
         $user_id = Auth::id();
         $assignments = Task::where('id', $taskId)->first();
         $files_submited = StudentFile::where('user_id' , $user_id)
                                        ->where('task_id', $taskId)
                                        ->first();

        $files_count = StudentFile::where('user_id' , $user_id)
                                        ->where('task_id', $taskId)
                                        ->count();
        $this->count = $files_count;
                                        
        if($files_count > 0)
        {
            $this->file_count = true;
        }
        else
        {
            $this->file_count = false;
        }
                            
         $task_student = (object)[
            'task' => [],
            'files_submited' => []
        ];

        $task_student->task = $assignments;
        $task_student->files_submited = $files_submited;
        
        return view('livewire.student-links.task-view-student', ['task_student' => $task_student]);
    }

    public function create()
    {
       
        if($this->count > 0)
        {
            $this->dispatchBrowserEvent('message', [ 'message' => "You've already pass your work !"]);
        }
        else
        {
            $validatedData = $this->validate([
                'file_path' => 'required|mimes:jpeg,png,docx,pdf',
            ]);
            $user = Auth::id();
            // dd($this->file);
            $filename = $this->file_path->getClientOriginalName();
            $task = $this->file_path->storeAs('/', $filename);
            $validatedData['file_path'] = $task;
            $taskId = $this->task;
            
            $validatedData['task_id'] = $taskId;
            $task = StudentFile::create($validatedData);
    
            $tasks = Task::where('id' , $this->task)->first();
            $deadline = $tasks->deadline;
    
            if($deadline < now())
            {
                $status = 'Turn In Late';
            }
            else 
            {
                $status = 'Turn In';
            }
           
            $task->status = $status;
    
            $task->user()->associate($user);
            // $task->task()->associate($task);
            $task->save();
        
            $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Your work has submitted successfully!']);
        }
       

    } 

    public function remove($id)
    {
        $this->student_file_being_removed = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
       
    }

    public function delete()
    {
        $student_file = StudentFile::findOrFail($this->student_file_being_removed);
        $student_file->delete();
        $this->dispatchBrowserEvent('deleted', [ 'message' => 'You have successfully removed your work !']);
    }

}
