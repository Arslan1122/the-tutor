<?php

namespace Database\Seeders;

use App\Models\Standard;
use App\Models\User;
use App\Models\UserStandard;
use Illuminate\Database\Seeder;

class StandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $standards = [
            'Primary Classes ( 1 - 5)',
            'Middle Classes ( 5 - 8)',
            'SSC (9 - 10)',
            'FA',
            'I.COM',
            'HSSC (1st year - 2nd year)',
            'O/A Levels',
        ];

        for($i=0; $i < sizeof($standards); $i++) {
            $standard = Standard::create([
                'name' => $standards[$i]
            ]);

            $user = User::role('teacher')->inRandomOrder()->first();

            UserStandard::create([
                'user_id' => $user->id,
                'standard_id' => $standard->id
            ]);
        }
    }
}
