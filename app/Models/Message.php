<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['chat_id', 'message', 'sender'];

    public function chat(){
        return $this->hasOne(Chat::class, 'id', 'chat_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'sender');
    }

}
