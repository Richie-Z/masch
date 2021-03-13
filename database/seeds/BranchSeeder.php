<?php

use Illuminate\Database\Seeder;
use App\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        $data= [ 
        	['name' => 'CinemaXIX Malang'],
        	['name' => 'CinemaXIX Jember'],
        	['name' => 'CinemaXIX Jakarta'],
        ];
        Branch::insert($data);
    }
}
