<?php

namespace App\Models;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ChatRoom extends Model
{
    use HasFactory;
    protected $fillable=['to','from','message','is_read'];

    public function user(){
        return $this->belongsTo(User::class,'from');
    }

    public function to(){
        return $this->belongsTo(User::class,'to');
    }
}
