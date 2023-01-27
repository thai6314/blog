<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $primaryKey = 'comment_id';
    public $timestamps = false;
    protected $fillable =[
        'parent_id',
        'user_id',
        'post_id',
        'comment',
        'status',
        'deleted_at'
    ];
}
