<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherQuizController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Extras
Route::get('/front-end-table', function () {
    return view('front-end.table');
})->name('front-end-table');

Route::get('/front-end-setting', function () {
    return view('front-end.setting');
})->name('front-end-setting');

// front end
Route::group(['middleware' => ['auth' , 'role:admin|teacher'  ]], function(){
    Route::get('/accounts', App\Http\Livewire\FrontEnd\Accounts::class )->name('accounts');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard' , 'App\Http\Controllers\FrontEnd\DashboardController@index')->name('dashboard');
    Route::post('/dashboard/action' , 'App\Http\Controllers\DashboardController@action');
    Route::get('/profile', App\Http\Livewire\FrontEnd\Profile::class )->name('profile');
    Route::get('/notification', App\Http\Livewire\FrontEnd\Notification::class )->name('notification');
    Route::get('/change-password', App\Http\Livewire\FrontEnd\ChangePassword::class )->name('change-password');
});

Route::group(['middleware' => ['auth' , 'role:teacher']], function(){
 
    Route::get('/subjects', App\Http\Livewire\FrontEnd\Teacher\ClassTeacher::class )->name('subjects-teacher');
    Route::get('/quiz', App\Http\Livewire\FrontEnd\TeacherAndStudent\SubjectQuiz::class )->name('quiz-teacher');
    Route::get('/subjects-quiz-responses/{result}/log', App\Http\Livewire\FrontEnd\TeacherAndStudent\QuizResponsesLog::class )->name('subjects-quiz-responses-log');

    Route::get('/teacher/question/{test}', 'App\Http\Controllers\TeacherQuizController@index')->name('question-teacher');
    Route::post('/teacher/question/store', 'App\Http\Controllers\TeacherQuizController@store')->name('add-question-teacher');
    Route::get('/student-responses/{test}', App\Http\Livewire\FrontEnd\TeacherAndStudent\QuizResponses::class )->name('student-responses');

    // Route::get('/question/{test}', App\Http\Livewire\TeacherLinks\QuestionTeacher::class )->name('question-teacher');
   //Route::get('/subjects/{subject}', App\Http\Livewire\TeacherLinks\FilesTeacher::class )->name('subjects-files');
});

Route::group(['middleware' => ['auth' , 'role:teacher|student']], function(){
    
    Route::get('/subjects/{subject}/content', App\Http\Livewire\FrontEnd\TeacherAndStudent\SubjectContent::class )->name('subjects-content');
    // Route::get('/subjects/view/file/{file}', App\Http\Livewire\FrontEnd\TeacherAndStudent\SubjectFiles::class )->name('subjects-files-view');
    Route::get('/subjects/view/task/{task}', App\Http\Livewire\FrontEnd\TeacherAndStudent\SubjectTaskView::class )->name('subjects-task-view');
   
    Route::get('/subject/view/{student}/progress', App\Http\Livewire\FrontEnd\TeacherAndStudent\StudentProgress::class )->name('student-learning-progress');
 });


 Route::group(['middleware' => ['auth' , 'role:student']], function(){
    Route::get('/subjects/student', App\Http\Livewire\FrontEnd\Student\ClassesStudent::class )->name('subjects-student');
    Route::get('/subjects/view/student/task/{task}', App\Http\Livewire\FrontEnd\Student\ClassTaskView::class )->name('subjects-task-view-student');
    Route::get('/student/scores', App\Http\Livewire\FrontEnd\Student\ClassTaskScore::class )->name('scores');
    Route::get('/student/grade', App\Http\Livewire\FrontEnd\Student\ClassTaskGrade::class )->name('grade');

    Route::get('/subjects/quiz/{test}', App\Http\Livewire\FrontEnd\Student\StudentQuiz::class )->name('student-quiz');
    
    Route::get('/student/progress', App\Http\Livewire\FrontEnd\Student\ClassTaskProgress::class )->name('student-progress');
});
//  front end








// Route::group(['middleware' => ['auth']], function(){
//     Route::get('/dashboard' , 'App\Http\Controllers\DashboardController@index')->name('dashboard');
//     Route::post('/dashboard/action' , 'App\Http\Controllers\DashboardController@action');
//     Route::get('/profile', App\Http\Livewire\Profile::class )->name('profile');
//     Route::get('/notification', App\Http\Livewire\Notification::class )->name('notification');
// });
/* Admin */
// Route::group(['middleware' => ['auth' , 'role:admin|teacher'  ]], function(){
//      Route::get('/accounts', App\Http\Livewire\AdminLinks\Accounts::class )->name('accounts');
//  });


/* Teacher */
// Route::group(['middleware' => ['auth' , 'role:teacher']], function(){

//     Route::get('/teacher/question/{test}', 'App\Http\Controllers\TeacherQuizController@index')->name('question-teacher');
//     Route::post('/teacher/question/store', 'App\Http\Controllers\TeacherQuizController@store')->name('add-question-teacher');
  
//     Route::get('/subjects', App\Http\Livewire\TeacherLinks\ClassTeacher::class )->name('subjects-teacher');
//     Route::get('/quiz', App\Http\Livewire\TeacherLinks\ClassTeacher::class )->name('quiz-teacher');
//     // Route::get('/question/{test}', App\Http\Livewire\TeacherLinks\QuestionTeacher::class )->name('question-teacher');
//    //Route::get('/subjects/{subject}', App\Http\Livewire\TeacherLinks\FilesTeacher::class )->name('subjects-files');
// });

// Route::group(['middleware' => ['auth' , 'role:teacher|student']], function(){
   
//     Route::get('/subjects/content/{subject}', App\Http\Livewire\TeacherLinks\SubjectTeacherContent::class )->name('subjects-content');
//     Route::get('/subjects/view/file/{file}', App\Http\Livewire\TeacherLinks\FileViewTeacher::class )->name('subjects-files-view');
//     Route::get('/subjects/view/task/{task}', App\Http\Livewire\TeacherLinks\TaskViewTeacher::class )->name('subjects-task-view');
//     Route::get('/progress/{student}', App\Http\Livewire\TeacherLinks\StudentProgress::class )->name('student-learning-progress');
//  });
 

/* Student */
// Route::group(['middleware' => ['auth' , 'role:student']], function(){
//     Route::get('/subjects/student', App\Http\Livewire\StudentLinks\SubjectStudent::class )->name('subjects-student');
//     Route::get('/student/grade', App\Http\Livewire\StudentLinks\StudentGrades::class )->name('grade');
//     Route::get('/student/scores', App\Http\Livewire\StudentLinks\Scores::class )->name('scores');
//     Route::get('/subjects/view/student/task/{task}', App\Http\Livewire\StudentLinks\TaskViewStudent::class )->name('subjects-task-view-student');
//     Route::get('/student/progress', App\Http\Livewire\StudentLinks\StudentProgressContent::class )->name('student-progress');
// });


require __DIR__.'/auth.php';
