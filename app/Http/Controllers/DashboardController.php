<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Classes;





class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('admin'))
        {
            $count =  User::all()->count();
            return view('dashboard.admin-dash', ['users' => $count]);
        }
        elseif(Auth::user()->hasRole('teacher'))
        {
             $id = Auth::id();
            // $subject =  Subject::where('teacher_id' , $id)->count();
            $subject = Auth::user()->classes()->count();
           
            return view('dashboard.teacher-dash', ['subjects' => $subject]);
        }
        elseif(Auth::user()->hasRole('student'))
        {
            return view('dashboard.student-dash');
        }
    }
 
}
