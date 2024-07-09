<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    public function run()
    {
        DB::table('staff')->insert([
            ['staff_id' => 'BK01', 'name' => 'John Doe', 'department' => 'HR'],
            ['staff_id' => 'BK02', 'name' => 'Jane Smith', 'department' => 'Marketing'],
            ['staff_id' => 'BK03', 'name' => 'Alice Johnson', 'department' => 'Finance'],
            ['staff_id' => 'BK04', 'name' => 'Michael Brown', 'department' => 'IT'],
            ['staff_id' => 'BK05', 'name' => 'Sarah Lee', 'department' => 'Operations'],
            ['staff_id' => 'BK06', 'name' => 'Mary Stuart', 'department' => 'Finance'],
            ['staff_id' => 'BK07', 'name' => 'Shema Shetou', 'department' => 'Security'],
        ]);
    }
}

