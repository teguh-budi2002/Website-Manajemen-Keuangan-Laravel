<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Dump User Member

        User::Create([
          'name' => 'Admin Website',
          'username' => 'adminwebsite123',
          'email' => 'admin@gmail.com',
          'password' => Hash::make("12345"),
          'age' => '20',
          'address' => 'Sidoarjo',
          'isAdmin' => FALSE
        ]);

        User::Create([
          'name' => 'Member Website',
          'username' => 'memberwebsite123',
          'email' => 'member@gmail.com',
          'password' => Hash::make("member123"),
          'age' => '20',
          'address' => 'Sidoarjo',
          'isAdmin' => FALSE
        ]);
    }
}
