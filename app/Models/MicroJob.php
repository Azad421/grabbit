<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicroJob extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'job_title', 'slug', 'category', 'description', 'job_duration', 'image', 'budget', 'status_id'];
    protected $primaryKey = 'job_id';
    protected $keyType = 'string';

    public function getCategory(){
        return $this->hasOne(Category::class, 'category_id', 'category');
    }
    public function status(){
        return $this->hasOne(JobStatus::class, 'status_id', 'status_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function order(){
        return $this->hasMany(Order::class, 'job_id', 'job');
    }
}
