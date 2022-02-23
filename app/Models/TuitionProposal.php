<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionProposal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tuition()
    {
        return $this->belongsTo(Tuition::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
