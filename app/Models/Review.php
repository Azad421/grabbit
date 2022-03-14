<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_review';
    protected $fillable = ['from_user', 'job_id', 'to_user', 'order_id', 'comments', 'rating', 'status'];

    public function fromUser(){
        return $this->hasOne(User::class, 'id', 'from_user');
    }
    public function toUser(){
        return $this->hasOne(User::class, 'id', 'to_user');
    }
}
