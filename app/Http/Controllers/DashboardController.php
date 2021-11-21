<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



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
            return view('dashboard.teacher-dash');
        }
        elseif(Auth::user()->hasRole('student'))
        {
            return view('dashboard.student-dash');
        }
    }
 
}
