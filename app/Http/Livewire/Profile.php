<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $email, $first_name, $middle_name, $last_name, $religion, $nationality, 
           $sex, $date_of_birth, $place_of_birth, $civil_status, $phone_number,
           $street, $city, $province, $country;

    public $update = false;

    public function render()
    {

        return view('livewire.profile');
    }

    public function noUpdate()
    {
        $this->reset();
        $this->update = false;
    }

    public function doUpdate()
    {
      
        $this->update = true;
        $user = Auth::user();
        $id = $user->id;
        $this->email = $user->email;
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


}
