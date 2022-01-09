<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table='student_profiles';
    protected $guarded=[];
}
