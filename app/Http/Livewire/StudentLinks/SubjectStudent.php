<?php

namespace App\Http\Livewire\StudentLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\ClassStudent;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubjectStudent extends Component
{

    public $show = false; 

    
    public $code;

    public function render()
    {
        $id = Auth::id();

        $student = User::find($id)->classstudent;
        return view('livewire.student-links.subject-student', ['students' => $student]);
    }

    public function doShow()
    {
        $this->show = true;
    }

    public function doClose()
    {
        $this->show = false; 
        $this->reset();
    }

    public function join()
    {
        $subject = new ClassStudent;
        $user = Auth::id();
        
        $code = Classes::where('code' , $this->code)->first();
       
    
            //$validate =  $code->code;
            //dd($validate);
            //validate
            // $validatedData = Validator::make(
            //     ['code' => $this->validate],
            //     ['code' => 'required'],
                
            // )->validate();

            $this->validate([
                'code' => 'required|exists:classes,code',
                
            ]);

            $id = $code->id;

            $subject->classes()->associate($id);
            $subject->user()->associate($user);
            $subject->save();
            $this->doClose();
        
      
    }
}
