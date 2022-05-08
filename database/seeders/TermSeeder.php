<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Term;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deleterecords = Term::truncate();
        $terms = [
            [
                
                'term' => 'one'
               
            ],
            [
                
                'term' => 'two'
               
            ],
            [
                
                'term' => 'three'
               
            ],
           

        ];

        foreach ($terms as $key => $value) {
            Term::create($value);
        }
    }
}
