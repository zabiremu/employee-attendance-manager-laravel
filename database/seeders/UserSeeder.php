<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin data
        $user = new User();
        $user->first_name = 'Admin';
        $user->full_name = 'Admin Zabir';
        $user->email = 'admin@admin.com';
        $user->status = 1;
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('Admin');

        // create user data
        $user = new User();
        $user->first_name = 'Employee';
        $user->full_name = 'Employee Rubel';
        $user->email = 'employee@employee.com';
        $user->status = 1;
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('Employee');

         // create user data
         $user = new User();
         $user->first_name = 'Arman';
         $user->full_name = 'Arman Hossain';
         $user->email = 'arman@employee.com';
         $user->status = 1;
         $user->password = Hash::make('password');
         $user->save();
         $user->assignRole('Employee');


          // create user data
        $user = new User();
        $user->first_name = 'Sakif';
        $user->full_name = 'Sakif Hossain';
        $user->email = 'sakif@employee.com';
        $user->status = 1;
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('Employee');


         // create user data
         $user = new User();
         $user->first_name = 'Abdul';
         $user->full_name = 'Abdul Hossain';
         $user->email = 'abdul@employee.com';
         $user->status = 1;
         $user->password = Hash::make('password');
         $user->save();
         $user->assignRole('Employee');


          // create user data
        $user = new User();
        $user->first_name = 'Rakib';
        $user->full_name = 'Rakib Raihan';
        $user->email = 'rakib@employee.com';
        $user->status = 1;
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('Employee');
    }
}
