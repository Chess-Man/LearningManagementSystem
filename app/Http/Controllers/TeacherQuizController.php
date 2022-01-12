<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;

class TeacherQuizController extends Controller
{

    public function index(Test $test)
    {
        $test_id = $test->id;
       
        $questions = Question::where('test_id', $test_id)->get();
       
        $test_name = $test->quiz_name;
        

        // $data = array(
        //     'title'=>'My App',
        //     'Description'=>'This is New Application',
        //     'author'=>'foo'
        //     );
        
        return view('front-end.teacher.quiz-questions', compact('test_id' , 'questions', 'test_name'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|max:3000',
            
        ]);

        $test_id = request('test_id');
        
        $test = Test::where('id' , $test_id)->first();
        $question = new Question;
        
        $question->question =  request('question');
        $question->choices = request('option');
        
        $question->test()->associate($test);
       
        $question->save();
       
        return redirect()->back()->with('message', 'You have successfully added an question');
    }

    public function destroy(Question $question)
    {
        $question->delete();
    }

   

}