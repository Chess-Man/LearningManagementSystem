<?php

namespace App\Http\Livewire\FrontEnd\Teacher;

use Livewire\Component;
use App\Models\Question;

class ShowQuestions extends Component
{

    protected $listeners = ['deleteConfirmed' => 'deleteFile'];
    public $questions; 
    public $questionIdBeingRemoved ;
    public $correct_answer ; 
    public $answer ; 

    public function mount($questions)
    {
        $this->questions = $questions ; 
    }
    public function render()
    {
        return view('livewire.front-end.teacher.show-questions', ['question' => $this->questions]);
    }

    public function confirmUserRemoval($id)
    {
       $this->questionIdBeingRemoved  = $id;
       $this->dispatchBrowserEvent('show-delete-confirmation'); 
    }

    public function deleteFile()
    {
        $question = Question::where('id' , $this->questionIdBeingRemoved);
        $question->delete();
        $this->questions = $this->questions->fresh();
        $this->dispatchBrowserEvent('deleted', [ 'message' => 'Question deleted successfully!']);
    }

    public function answer(Question $question)
    {
        $data =  $this->validate([
                'correct_answer' => 'required',
        ]);
        $question->update($data);
        $this->questions = $this->questions->fresh();
    }

 
}
