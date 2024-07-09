<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Security;

class SecuritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $securities = [
            [
                'staff_id' => 'BK20',
                'name' => 'John Wick',
                'password' => Hash::make('password1')
            ],
            [
                'staff_id' => 'BK21',
                'name' => 'Ragnar Rothbrok',
                'password' => Hash::make('password2')
            ],
            [
                'staff_id' => 'BK22',
                'name' => 'Paulo Maldini',
                'password' => Hash::make('password3')
            ],
            // Add more unique entries as needed
        ];

        foreach ($securities as $security) {
            Security::create($security);
        }
    }
}

