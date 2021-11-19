<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\TeacherLinks\SubjectTeacher;
use App\Http\Livewire\AdminLinks\Accounts;
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




Route::get('/subjects', SubjectTeacher::class )->name('subjects-teacher');
Route::get('/accounts', Accounts::class )->name('accounts');


Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard' , 'App\Http\Controllers\DashboardController@index')->name('dashboard');
   
});
/* Admin */
Route::group(['middleware' => ['auth' , 'role:admin']], function(){

});

/* Teacher */
Route::group(['middleware' => ['auth' , 'role:teacher']], function(){

});

/* Student */
Route::group(['middleware' => ['auth' , 'role:student']], function(){
    
});



Route::get('/subject', function () {
    return view('links.subject');
})->name('subject');
Route::get('/subject/task', function () {
   return view('links.subject-content-task');
})->name('subject-content-task');

Route::get('/task', function () {
    return view('links.task');
})->name('task');

Route::get('/file', function () {
    return view('links.file');
})->name('file');

Route::get('/grades', function () {
    return view('links.grades');
})->name('grades');

Route::get('/account', function () {
    return view('links.account');
})->name('account');

Route::get('/notifications', function () {
    return view('links.notifications');
})->name('notifications');

Route::get('/profile', function () {
    return view('links.profile');
})->name('profile');

Route::get('/student', function () {
    return view('links.student');
})->name('student');


require __DIR__.'/auth.php';
