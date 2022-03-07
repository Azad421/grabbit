<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name', 'category_status', 'category_slug', 'description', 'image'];
    protected $primaryKey = 'category_id';
    protected $keyType = 'string';

    public function status(){
        return $this->hasOne(Status::class,'status_id', 'category_status');
    }
}
