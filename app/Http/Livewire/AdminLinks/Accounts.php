<?php

namespace App\Http\Livewire\AdminLinks;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use App\Notifications\teacher\TaskCreateNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;


class Accounts extends Component
{
    use WithPagination;
    protected $listeners = ['deleteConfirmed' => 'deleteUser'];

    public $email;
    public $password;
    public $confirm_password;
    public $role;
    public $name;

    public $show = false ;
    public $search; 
    public $userIdBeingRemoved = null; 
    public $user;
    public $notifMessage;
    
   

    public function render()
    {
        return view('livewire.admin-links.accounts',[
            'users' =>  User::query()
                        ->where('email','like','%'. $this->search.'%')
                        ->orWhere('name','like','%'. $this->search.'%')
                        ->latest()
                        ->paginate(10)
        ]); 
    }


    public function doShow() 
    {
        $this->reset();
        $this->show = true;
    }

    public function doClose() 
    {
        $this->show = false;
        $this->reset();
    }

    public function create()
    {
        
        $this->validate([
                //'email' => 'required|min:6|unique:users,email,'.$this->user->id,
                'name' => 'required|unique:users,name',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:5',
                'confirm_password' => 'required|min:5|required_with:password|same:password',
                'role' => 'required'
        ]);
        
        
        $user = new User;
        $user = $user->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $userDetail = new UserDetail;
        $userDetail->user()->associate($user);
        $userDetail->save();
        $user->attachRole($this->role);

        // Notification
        if(Auth::user()->hasRole('teacher'))
        {
            //Notification for ?
            $user = User::whereRoleIs('admin')->get();
            
            //  message content
            $users = Auth::user();
            $user_name = $users->name;
        
            $this->notifMessage =  $user_name .' have created an account  '.$this->email;
            Notification::send($user , new TaskCreateNotification($this->notifMessage));
        }    

        $this->doClose();
        $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Account created successfully!']);
    }

    public function deleteUser()
    {
       $user = User::findOrFail($this->userIdBeingRemoved);
       $user_email = $user->email;
       
       
       $user->delete();

       if(Auth::user()->hasRole('teacher'))
       {
           //Notification for ?
           $user = User::whereRoleIs('admin')->get();
           
           //  message content
           $users = Auth::user();
           $user_name = $users->name;
       
           $this->notifMessage =  $user_name .' has deleted an account  '.$user_email;
           Notification::send($user , new TaskCreateNotification($this->notifMessage));
       }

       $this->dispatchBrowserEvent('deleted', [ 'message' => 'User deleted successfully!']);
    }
 
    public function confirmUserRemoval($userId)
    {
       $this->userIdBeingRemoved = $userId;
       $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function edit(User $user)
    {

        $this->doShow();
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->show = 'update';
      
    }

    public function update()
    {
        
        if($this->show === 'update')
        {
           $data =  $this->validate([
                'name' => 'required|unique:users,name,'.$this->user->id,
                'email' => 'required|unique:users,email,'.$this->user->id,
            ]);
        }
    
        if(!empty($this->password))
        {
            $data =  $this->validate([
                'password' => 'required|min:5',
                'confirm_password' => 'required|min:5|required_with:password|same:password',
            ]);
            $data['password'] = $this->password =  Hash::make($this->password);
        }
        $this->user->update($data);

        
       //Update Notification
        if(Auth::user()->hasRole('teacher'))
        {
            //Notification for ?
            $user = User::whereRoleIs('admin')->get();
            
            //  message content
            $users = Auth::user();
            $user_name = $users->name;
            $user_email = $this->user->email;
            
            $this->notifMessage =  $user_name .' update an account  '.$user_email;
            Notification::send($user , new TaskCreateNotification($this->notifMessage));
        }

        $this->doClose();
        
        $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Account updated successfully!']);
    }
  
}
