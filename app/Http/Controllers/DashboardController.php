<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Classes;
use App\Models\Event;




class DashboardController extends Controller
{
    public function index(Request $request)
    {   
        if($request->ajax())
        {
            $user_id = Auth::id();
            $data = Event::where('user_id', $user_id)
            ->whereDate('start', '>=', $request->start)
            ->whereDate('end',   '<=', $request->end)
            ->get(['id', 'title', 'start', 'end']);
             return response()->json($data);
        }

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
    
    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
                $user_id = Auth::id();
    			$event = Event::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end,
                    'user_id'   => $user_id,
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();

    			return response()->json($event);
    		}
    	}
    }
 
}
