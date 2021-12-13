<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Classes;
use App\Models\Event;
use App\Models\StudentFile;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;




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
            $subject = Auth::user()->classes()->where('shown' , 1)->count();
            // dd($subject);
            return view('dashboard.teacher-dash', ['subjects' => $subject]);
        }
        elseif(Auth::user()->hasRole('student'))
        {
            $user_id = Auth::id();
            $count_existence = StudentFile::where('user_id' , $user_id)->count();
            
            if ($count_existence > 0)
            {
                
                $score = StudentFile::where('user_id' , $user_id)->sum('points');
        
                $total = Task::whereHas('studentFile', function(Builder $query){
                    $query->where('user_id' ,  Auth::id());
                })->sum('points');
    
                // dd([$score, $total]);
    
                $progress = $score / $total * 100;
            
                return view('dashboard.student-dash', ['progress' => $progress]);
            }
            $progress = null;
            return view('dashboard.student-dash', ['progress' => $progress]);
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
