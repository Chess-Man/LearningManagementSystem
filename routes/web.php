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

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');








Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard' , 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::post('/dashboard/action' , 'App\Http\Controllers\DashboardController@action');
    Route::get('/profile', App\Http\Livewire\Profile::class )->name('profile');
    Route::get('/notification', App\Http\Livewire\Notification::class )->name('notification');
});
/* Admin */
Route::group(['middleware' => ['auth' , 'role:admin|teacher'  ]], function(){
     Route::get('/accounts', App\Http\Livewire\AdminLinks\Accounts::class )->name('accounts');
 });


/* Teacher */
Route::group(['middleware' => ['auth' , 'role:teacher']], function(){

    Route::get('/teacher/question/{test}', 'App\Http\Controllers\TeacherQuizController@index')->name('question-teacher');
    Route::post('/teacher/question/store', 'App\Http\Controllers\TeacherQuizController@store')->name('add-question-teacher');
  
    Route::get('/subjects', App\Http\Livewire\TeacherLinks\ClassTeacher::class )->name('subjects-teacher');
    Route::get('/quiz', App\Http\Livewire\TeacherLinks\ClassTeacher::class )->name('quiz-teacher');
    // Route::get('/question/{test}', App\Http\Livewire\TeacherLinks\QuestionTeacher::class )->name('question-teacher');
   //Route::get('/subjects/{subject}', App\Http\Livewire\TeacherLinks\FilesTeacher::class )->name('subjects-files');
});

Route::group(['middleware' => ['auth' , 'role:teacher|student']], function(){
   
    Route::get('/subjects/content/{subject}', App\Http\Livewire\TeacherLinks\SubjectTeacherContent::class )->name('subjects-content');
    Route::get('/subjects/view/file/{file}', App\Http\Livewire\TeacherLinks\FileViewTeacher::class )->name('subjects-files-view');
    Route::get('/subjects/view/task/{task}', App\Http\Livewire\TeacherLinks\TaskViewTeacher::class )->name('subjects-task-view');
    Route::get('/progress/{student}', App\Http\Livewire\TeacherLinks\StudentProgress::class )->name('student-learning-progress');
 });
 

/* Student */
Route::group(['middleware' => ['auth' , 'role:student']], function(){
    Route::get('/subjects/student', App\Http\Livewire\StudentLinks\SubjectStudent::class )->name('subjects-student');
    Route::get('/student/grade', App\Http\Livewire\StudentLinks\StudentGrades::class )->name('grade');
    Route::get('/student/scores', App\Http\Livewire\StudentLinks\Scores::class )->name('scores');
    Route::get('/subjects/view/student/task/{task}', App\Http\Livewire\StudentLinks\TaskViewStudent::class )->name('subjects-task-view-student');
    Route::get('/student/progress', App\Http\Livewire\StudentLinks\StudentProgressContent::class )->name('student-progress');
});


require __DIR__.'/auth.php';
