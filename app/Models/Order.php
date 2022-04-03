<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['job_id', 'from_user', 'to_user', 'amount', 'payment', 'quantity', 'duration', 'order_note', 'status'];

    public function job(){
        return $this->hasOne(MicroJob::class, 'job_id', 'job_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'from_user');
    }
    public function statusInfo(){
        return $this->hasOne(OrderStatus::class, 'id', 'status');
    }

    public function review(){
        return $this->hasMany(Review::class, 'order_id', 'id');
    }

}
