<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserClient;

class User extends Authenticatable
{
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'email', 'password', 'users_client_id'
    ];

    protected $hidden = [
      'password'
    ];

    public function client() {
        return $this->belongsTo(UserClient::class, 'client_id');
    }
}
