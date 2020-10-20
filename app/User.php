<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name','email','document','address','departments_id','cities_id','phone','password'];
 
    protected $hidden = ['password','remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];
}
