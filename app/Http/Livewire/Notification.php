<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class Notification extends Component
{
    
    public function render()
    {
        
        $notifications = Auth::user()->notifications;
        
        return view('livewire.notification', ['notifications' => $notifications]);
    }

    public function read( $notif)
    {
        $notif_id = $notif['id'];
        
        DB::table('notifications')->where('id', $notif_id)->update(['read_at'=>Carbon::now()]);

    }

    public function unread( $notif)
    {
        $notif_id = $notif['id'];
        
        DB::table('notifications')->where('id', $notif_id)->update(['read_at'=> null]);

    }

    public function MarkAllAsRead()
    {
        DB::table('notifications')->where('read_at', null)->update(['read_at'=> Carbon::now()]);
    }

}
