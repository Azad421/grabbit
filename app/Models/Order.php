<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['job_id', 'user_id', 'amount', 'payment', 'quantity', 'duration', 'order_note', 'status'];
}
