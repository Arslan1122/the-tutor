<?php

namespace Database\Seeders;

use App\Models\StudentProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(20)->create()->each(function ($user) {
            $user->assignRole('student');
            $profile = new StudentProfile();
            $profile->user_id = $user->id;
            $profile->save();
        });
    }
}
