<?php

namespace Database\Seeders;

use App\Models\TeacherProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::factory()->count(20)->create()->each(function ($user) {
           $user->assignRole('teacher');
           $profile = new TeacherProfile();
           $profile->user_id = $user->id;
           $profile->save();
       });
    }
}
