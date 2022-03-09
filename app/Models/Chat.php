<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['from_user', 'to_user'];


    public function fromUser(){
        return $this->hasOne(User::class, 'id', 'from_user');
    }


    public function toUser(){
        return $this->hasOne(User::class, 'id', 'to_user');
    }


    public function messages()
    {
        return $this->hasManyThrough(Message::class, 'id', 'chat_id');
    }
}
