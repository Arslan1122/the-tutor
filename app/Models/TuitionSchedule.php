<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionSchedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['class_date'];

    public function tuition()
    {
        return $this->belongsTo(Tuition::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }
}
