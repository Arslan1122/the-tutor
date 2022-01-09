<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin'=>'boolean',
    ];

    public function getFirstnameAttribute(){
        $new=explode(' ',$this->name);
        return $new[0];
    }
    public function getLastnameAttribute(){
        $new=explode(' ',$this->name);
        if(array_key_exists('1', $new)){
            return $new[1];
        }else{
            return ' ';
        }

    }

}
