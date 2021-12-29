<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\UserDetail;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user = $user->create([
            'name' => 'admin',
            'email' => 'admin',
            'password' => Hash::make('password'),
        ]);
        $userDetail = new UserDetail;
        $userDetail->user()->associate($user);
        $userDetail->save();
        $user->attachRole('admin');
    }
}
