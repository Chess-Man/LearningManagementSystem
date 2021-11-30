<?php

namespace App\Http\Livewire\TeacherLinks;

use Livewire\Component;
use App\Models\ClassStudent;
use App\Models\Classes;
use Livewire\WithPagination;

class StudentClass extends Component
{
    use WithPagination;
    public $subject = null;
    public $show = false;
    public $student;

    public $name , $final_grade;
    public $search;

    public function render()
    {
        $id = $this->subject->id;
        
          
                // $student = Classes::find($id)
                // ->user()
                // ->where('name','like','%'. $this->search.'%')
                // ->latest()
                // ->get();
               
                $student = Classes::find($id)
                ->classstudent()
                ->latest()
                ->get();

        return view('livewire.teacher-links.student-class', ['students' => $student]);
    }

    public function doClose()
    {   
       
        $this->show = false;
    }

    public function edit(ClassStudent $student)
    {

        $this->show = true;
        $this->student = $student;

        $this->name = $student->user->name; 
        $this->final_grade = $student->final_grade; 
    }

    public function update()
    {
        $data =  $this->validate([
            'final_grade' => 'required|numeric|between:1,100',
        ]);
         
        $this->student->update($data);
        $this->doClose();
        session()->flash('message', 'Account updated successfully');
    }

}
