<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            'IELTS',
            'Spoken English',
            'Computer Graphics',
            'Islamic Education',
            'Special Education'
        ];

        for($i=0; $i < sizeof($courses); $i++) {
            $course = Course::create([
                'name' => $courses[$i]
            ]);

            $user = User::role('teacher')->inRandomOrder()->first();

            UserCourse::create([
                'user_id' => $user->id,
                'course_id' => $course->id
            ]);
        }
    }
}
