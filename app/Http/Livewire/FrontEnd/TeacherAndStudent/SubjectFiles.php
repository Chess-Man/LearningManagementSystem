<?php

namespace App\Http\Livewire\FrontEnd\TeacherAndStudent;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\File;
use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\teacher\TaskCreateNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class SubjectFiles extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteFile'];

    use WithFileUploads;
    use WithPagination;
    public $show = false;

    public $subject = null;

    public $name, $instruction, $file ;
    public $search;
    public $fileIdBeingRemoved;
    
    public function render()
    {
       
        // $id = $this->subject->id;
        $subject = $this->subject;
        $id = $subject->id;
     
        $file = Classes::find($id)
                        ->files()
                        ->where('name' , 'like' , '%'  . $this->search.'%')
                        ->latest()
                        ->paginate(10);
        return view('livewire.front-end.teacher-and-student.subject-files', ['files' => $file]);

    }

    public function download($id)
    {
        $dl = File::find($id);
        return Storage::download($dl->file_path);
    }

    // public function view($id)
    // {
    //     $dl = File::find($id);
    //     return Storage::get($dl->file_path, $dl->file_name);
    // }

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

    public function showForm()
    {
        $this->dispatchBrowserEvent('showForm');
        $this->reset(['name', 'instruction' , 'file']);
    }

    public function hideForm()
    {
        $this->dispatchBrowserEvent('hideForm');
        $this->resetValidation();
    }

    public function create()
    {

        $validatedData = $this->validate([
            'name' => 'required| max:50',
            'instruction' =>  'required|max:150',
          
            'file' => 'required|mimes:jpeg,png,docx,pdf'
        ]);

        // dd($this->file);
        $file = $this->file->getClientOriginalName();
        $filename = $this->file->storeAs('/', $file);
        $validatedData['file_path'] = $filename;
        $subject = $this->subject;
        $file = File::create($validatedData);
        $file->classes()->associate($subject);
        $file->save();
        
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
          $this->notifMessage=  $user_name .' uploaded a new file  '.$this->name. ' in '  .$subject_subject . $subject_description  ;
          Notification::send($user , new TaskCreateNotification($this->notifMessage));

        $this->hideForm();
        $this->dispatchBrowserEvent('showmessage', [ 'message' => 'File created successfully!']);
    }

}
