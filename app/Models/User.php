<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jazmy\FormBuilder\Traits\HasFormBuilderTraits;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,
        HasRoles, HasFormBuilderTraits,Billable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'is_approved',
        'is_admin',
        'is_block',
        'no_of_bids',
        'is_subscribed',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin'=>'boolean',
    ];

    public function getFirstnameAttribute()
    {
        $new=explode(' ',$this->name);
        return $new[0];
    }

    public function getLastnameAttribute()
    {
        $new=explode(' ',$this->name);

        if(array_key_exists('1', $new)){
            return $new[1];
        } else{
            return ' ';
        }
    }

    public function teacherProfile()
    {

        return $this->hasOne(TeacherProfile::class);
    }

    public function studentProfile()
    {
        return $this->hasOne(StudentProfile::class);
    }

    public function courses()
    {
        return $this->hasMany(UserCourse::class);
    }

    public function subjects()
    {
        return $this->hasMany(UserSubject::class);
    }

    public function standards()
    {
        return $this->hasMany(UserStandard::class);
    }
}
