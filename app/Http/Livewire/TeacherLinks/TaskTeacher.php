<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\StudentFile;
use App\Models\User;
use App\Notifications\teacher\TaskCreateNotification;
use Illuminate\Support\Facades\Notification;

class TaskTeacher extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteTask'];
    use WithFileUploads;
    public $show = false;

    public $subject = null;

    public $name, $instruction, $file, $deadline, $points, $notifMessage , $notify_at;
    public $searchTerm;
    public $taskIdBeingRemoved;
    public $task;

    public function render()
    {
        $id = $this->subject->id;

            $task = Classes::find($id)
            ->tasks()
            ->where('name' , 'like' , '%'  . $this->searchTerm.'%')
            ->latest()
            ->paginate(10);

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
            'name' => 'required| max:500',
            'instruction' => 'required| max:1000',
            'file' => 'required|mimes:jpeg,png,docx,pdf',
            'points' => 'required|integer',
            'deadline' => 'required'
        ]);

        // dd($this->file);
        $file = $this->file->getClientOriginalName();
        $taskname = $this->file->storeAs('public/storage', $file);
        $validatedData['file_path'] = $taskname;
        $subject = $this->subject;
        $task = Task::create($validatedData);
        $task->classes()->associate($subject);
        $task->save();

        //Notification for ?
        $code =  $this->subject->code;
        
        $student = ClassStudent::where('code' , $code)->get();
       
        $students_id = []; 
        foreach($student as $id){
            $students_id[]= $id->user_id;
        }
    
        $user = User::findOrFail($students_id)->all(); 
       
       //  message content
        $users = Auth::user();
        $user_name = $users->name;
        $subject_description = $this->subject->description;
        $subject_subject = $this->subject->subject;
        

        // $this->notify_at = ;
        $this->notifMessage=  $user_name .' added an task  '.$this->name. ' at '  .$subject_subject . $subject_description  ;
        Notification::send($user , new TaskCreateNotification($this->notifMessage));
       

        $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Task created successfully!']);
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

          //Notification for ?
        //   $code =  $this->subject->code;
        
        //   $student = ClassStudent::where('code' , $code)->get();
         
        //   $students_id = []; 
        //   foreach($student as $id){
        //       $students_id[]= $id->user_id;
        //   }
      
        //   $user = User::findOrFail($students_id)->all(); 
         
        //  //  message content
        //   $users = Auth::user();
        //   $user_name = $users->name;
        //   $subject_description = $this->subject->description;
        //   $subject_subject = $this->subject->subject;
        //   $task_name = $file->name;
  
        //   // $this->notify_at = ;
        //   $this->notifMessage=  $user_name .' deleted an task '.$task_name. ' at '  .$subject_subject . $subject_description  ;
        //   Notification::send($user , new TaskCreateNotification($this->notifMessage));

       $this->dispatchBrowserEvent('deleted', [ 'message' => 'Task deleted successfully!']);
    }

    public function edit(Task $task)
    {
       
        $this->doShow();
        $this->task = $task;
        $this->name = $task->name;
        $this->instruction = $task->instruction;
        $this->points = $task->points;
        $this->file = $task->file_path;
        $this->deadline = $task->deadline;
        $this->show = 'update';
       
    }

    public function update()
    {
            $validatedData = $this->validate([
                'name' => 'required| max:500',
                'instruction' => 'required| max:1000',
                'file' => 'required|mimes:jpeg,png,docx,pdf',
                'points' => 'required|integer',
                'deadline' => 'required'
            ]);
            $this->task->update($validatedData);

             //Notification for ?
             $code =  $this->subject->code;
        
             $student = ClassStudent::where('code' , $code)->get();
            
             $students_id = []; 
             foreach($student as $id){
                 $students_id[]= $id->user_id;
             }
         
             $user = User::findOrFail($students_id)->all(); 
            
            //  message content
             $users = Auth::user();
             $user_name = $users->name;
             $subject_description = $this->subject->description;
             $subject_subject = $this->subject->subject;
             
             // $this->notify_at = ;
             $this->notifMessage=  $user_name .' update an task  '.$this->name. ' at '  .$subject_subject . $subject_description  ;
             Notification::send($user , new TaskCreateNotification($this->notifMessage));
            
            $this->doClose();
            
            $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Account updated successfully!']);
    }



}
