<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $primaryKey = 'post_id';
    protected $fillable = [
        'title',
        'photo',
        'content',
        'user_id',
        'category_id',
        'views',
        'hot_flag',
        'post_time'
    ];
}
