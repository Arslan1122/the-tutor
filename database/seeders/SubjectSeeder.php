<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use App\Models\UserSubject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            'Primary All Subjects',
            'Middle All Subjects',
            'Science (Math, Physics, Chemistry/Computer)',
            'I.COM (Accounting, Economics)',
            'English',
            'Urdu',
            'Chemistry',
            'Physics',
            'Mathematics',
            'Biology',
            'Computer',
            'Social Studies',
            'Islamic Studies',
            'O/A Levels (Science Group)',
            'O/A Levels (General Science Group)',
            'O/A Levels ( Business Group )',
            'History',
            'Geographery',
        ];

        for($i=0; $i < sizeof($subjects); $i++) {
            $subject = Subject::create([
                'name' => $subjects[$i]
            ]);

            $user = User::role('teacher')->inRandomOrder()->first();

            UserSubject::create([
                'user_id' => $user->id,
                'subject_id' => $subject->id
            ]);
        }
    }
}
