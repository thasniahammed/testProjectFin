<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deleterecords = User::truncate();
        $user = [
            [
                
                'name' => 'admin',
                'email' => 'admin@testproject.com',
                'password' => bcrypt('admin'),
            ],
           

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
