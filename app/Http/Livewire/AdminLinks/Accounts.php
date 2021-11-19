<?php

namespace App\Http\Livewire\AdminLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Accounts extends Component
{

    public $email;
    public $password;
    public $confirm_password;
    public $role;

    public function render()
    {
        return view('livewire.admin-links.accounts');
    }

    public function create()
    {
        $user = new User;
        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $userDetail = new UserDetail;
        $userDetail->user()->associate($user);
        $userDetail->save();
        $user->attachRole($this->role);
    }
  
}
