<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Profile extends Component
{
    public $display_name, $email, $first_name, $middle_name, $last_name ,
    $religion, $nationality , $sex , $date_of_birth, $civil_status, $place_of_birth, 
    $phone_number, $street, $city, $province, $country;

    public $user;
    public $show = false ;
    public $next = 1;


    public function render()
    {

        return view('livewire.profile');
    }

    public function add()
    {   
        $this->next++;
        
    }

    public function minus()
    {
        $this->next--;
    }

    public function doClose()
    {
        $this->show = false;
        $this->next = 1;
    }

    public function doShow()
    {
            $this->show = true;
            $user = Auth::user();
            $this->user = $user;
            $this->first_name = $user->userdetail->first_name;
            $this->middle_name = $user->userdetail->middle_name;
            $this->last_name = $user->userdetail->last_name;
            $this->religion = $user->userdetail->religion;
            $this->nationality = $user->userdetail->nationality;
            $this->sex = $user->userdetail->sex;
            $this->date_of_birth = $user->userdetail->date_of_birth;
            $this->civil_status = $user->userdetail->civil_status;
            $this->place_of_birth = $user->userdetail->place_of_birth;
            $this->phone_number = $user->userdetail->phone_number;
            $this->street = $user->userdetail->street;
            $this->city = $user->userdetail->city;
            $this->province = $user->userdetail->province;
            $this->country = $user->userdetail->country;
        
    }

    public function update()
    {
    

        $this->user->userdetail->update([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'religion' => $this->religion,
            'nationality' => $this->nationality,
            'sex' => $this->sex,
            'date_of_birth' => $this->date_of_birth,
            'civil_status' => $this->civil_status,
            'place_of_birth' => $this->place_of_birth,
            'phone_number' => $this->phone_number,
            'street' => $this->street,
            'city' => $this->city,
            'province' => $this->province,
            'country' => $this->country,
        
        ]);
        $this->doClose();
        $this->dispatchBrowserEvent('showmessage', [ 'message' => 'Profile updated successfully!']);
    }

}
