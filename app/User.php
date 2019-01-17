<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Contracts\Auth\Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
    //protected $table = 'users';
    //protected $primaryKey = 'ID';
    //protected $connection = 'mysql';
    protected $maps =[
        'user_nicename' => 'name',
        'user_email' => 'email',
        'user_pass' => 'password',
    ];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    /*protected static $aliases = [
        'login' => 'user_login',
        'email' => 'user_email',
        'slug' => 'user_nicename',
        'password' => 'user_pass',
    ];*/
}
