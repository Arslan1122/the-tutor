<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuition extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }

    public function isAcceptedproposals()
    {
        return $this->hasMany(TuitionProposal::class)->where('is_accepted', 1);
    }

    public function review()
    {
        return $this->hasOne(TuitionRating::class);
    }
}
