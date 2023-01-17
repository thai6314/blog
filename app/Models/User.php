<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticate;

class User extends Authenticate
{
    use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'avatar',
        'birth_day',
        'gender',
        'address',
        'role',
        'status',
        'token',
        'token_expired',
        'deleted_at'
    ];
    protected $hidden = [
        'password',
        'token'
    ];

}
