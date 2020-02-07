<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserClient extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'contact_number',
    ];

    protected $table = 'users_client';

    public function user() {
        return $this->hasOne(User::class, 'client_id');
    }

    public function service_requests() {
        return $this->hasMany(ServiceRequest::class, 'client_id');
    }
}
