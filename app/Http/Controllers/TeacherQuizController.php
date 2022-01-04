<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;

class TeacherQuizController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required',
            'option' => 'required',
            'correct_answer' => 'required',
        ]);

        $test_id = request('test_id');
        
        $test = Test::where('id' , $test_id)->first();
        $question = new Question;
           
        $question->question =  request('question');
        $question->choices = request('option');
        $question->correct_answer = request('correct_answer');
        
        $question->test()->associate($test);
       
        $question->save();

        return redirect()->back()->with('message', 'You have successfully added an question');
    }

    public function index(Test $test)
    {
        $test_id = $test->id;

        $tests = Question::where('test_id', $test_id)->get();
       

        // $data = array(
        //     'title'=>'My App',
        //     'Description'=>'This is New Application',
        //     'author'=>'foo'
        //     );
        
        return view('links.question-teacher', compact('test_id' , 'tests'));
    }

   

}
