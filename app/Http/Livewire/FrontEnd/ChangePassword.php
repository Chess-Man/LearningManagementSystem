<?php

namespace App\Http\Livewire\FrontEnd;

use Livewire\Component;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Component
{
    public $current_password , $new_password , $new_password_confirmation ;

    public function render()
    {
        return view('livewire.front-end.change-password');
    }

    public function updatePassword()
    {
        // dd([$this->current_password , $this->new_password , $this->new_password_confirmation]);
        $validate  = $this->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed'],
            'new_password_confirmation' => 'required'
        ]);

        $hashedPassword = Auth::user()->password;
        
        if (Hash::check($this->current_password, $hashedPassword)){
            $user = User::find(Auth::id());
          
            $user->password = Hash::make($this->new_password);
            $user->save();
            $this->reset(['current_password' , 'new_password' , 'new_password_confirmation']);
            $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Password updated successfully!']);
        } 
    }

}
