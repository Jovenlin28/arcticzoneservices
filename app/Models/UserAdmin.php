<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAdmin extends Authenticatable
{

    protected $table = 'users_admin';

    protected $fillable = [
      'username', 'password'
    ];

    protected $hidden = [
      'password'
    ];

}
