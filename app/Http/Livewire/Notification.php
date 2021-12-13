<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Notification extends Component
{
    public function render()
    {
        $user = Auth::user();
        return view('livewire.notification', compact('user'));
    }
}
