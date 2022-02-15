<?php

namespace App\Models\Teacher;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table='teacher_profiles';
    protected $guarded=[];

}
