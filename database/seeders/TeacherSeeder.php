<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deleterecords = Teacher::truncate();
        $teachers = [
            [
                
                'name' => 'Katie'
               
            ],
            [
                
                'name' => 'Max'
               
            ],
            [
                
                'name' => 'Carolyn'
               
            ],
           

        ];

        foreach ($teachers as $key => $value) {
            Teacher::create($value);
        }
    }
}
