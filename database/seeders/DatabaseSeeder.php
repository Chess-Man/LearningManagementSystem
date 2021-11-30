<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserDetail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    

    public function run()
    {
        
        //\App\Models\User::factory(10)->create();
        // $user = new User;
        // $user->create([
        //     'display_name' => 'admin333  ',
        //     'email' => 'admin333@gmail.com',
        //     'password' => bcrypt('123456'),
        // ]);
        // $user->attachRole('admin');

        $this->call(LaratrustSeeder::class);
    }
}
