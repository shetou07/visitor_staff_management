<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'BK Boss',
            'email' => 'boss@admin.com',
            'password' => Hash::make('boss@bk'),
        ]);
        Admin::updateOrCreate([
            'email' => 'admin@bk.com'
        ], [
            'name' => 'Admin01',
            'password' => Hash::make('admin@bk'),
        ]);
    }
}
