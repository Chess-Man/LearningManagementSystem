<?php

namespace App\Http\Livewire\FrontEnd\TeacherAndStudent;

use Livewire\Component;
use App\Models\User;
use App\Models\Test;
use App\Models\Classes;
use App\Models\ClassStudent;
use App\Notifications\teacher\TaskCreateNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;

class SubjectQuiz extends Component
{
    protected $listeners = ['deleteConfirmed' => 'deleteQuiz'];
    public $quiz_name , $instruction , $deadline ; 

    public $show = false ;
    public $subject = null; 
    public $search;
    public $quizIdBeingRemoved;

    public function render()
    {
        $id = $this->subject->id;
        $tests = Classes::find($id)
                        ->tests()
                        ->where('quiz_name' , 'like' , '%'  . $this->search.'%')
                        ->latest()
                        ->paginate(10);   
      
        $current_date = Carbon::now();
     
        // $elapsed = $date->diffForHumans($current_date);
        return view('livewire.front-end.teacher-and-student.subject-quiz', ['tests' => $tests , 'current_date' => $current_date]);
    }

    public function showForm()
    {
        $this->dispatchBrowserEvent('showForm');
        $this->reset(['instruction' ,'show' , 'deadline']);
        
    }

    public function hideForm()
    {
        $this->dispatchBrowserEvent('hideForm');
        $this->resetValidation();
    }

    public function create()
    {
        $code = $this->subject->code;
        
        $validatedData = $this->validate([
            'quiz_name' => 'required',
            'deadline' => 'required',
        ]);

        $validatedData['instruction'] = $this->instruction;

        // dd($this->file);
        $subject = $this->subject;
        $file = Test::create($validatedData);
        $file->classes()->associate($subject);
        $file->save();

        // Notification
         
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
          $this->notifMessage=  $user_name .' posted a quiz  '.$this->quiz_name. ' in '  .$subject_subject . $subject_description  ;
          Notification::send($user , new TaskCreateNotification($this->notifMessage));

        // Notification

        $this->hideForm();
        $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Quiz added successfully!']);
    }

    public function edit(Test $quiz)
    {

        $this->dispatchBrowserEvent('showForm');
        $this->quiz_name = $quiz->quiz_name;
        $this->instruction = $quiz->instruction;
        $this->show = 'update';
    }

    public function update()
    {
        dd('here');
    }

    public function delete($id)
    {
        $this->quizIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }


    public function deleteQuiz()
    {
       $test = Test::findOrFail($this->quizIdBeingRemoved);
       $test->delete();
       $this->dispatchBrowserEvent('deleted', [ 'message' => 'File deleted successfully!']);
    }


}

