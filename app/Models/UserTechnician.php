<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserTechnician extends Authenticatable
{
    // protected $fillable = [
    //     'firstname', 'lastname', 'contact_number',
    // ];

    protected $table = 'users_tech';

    protected $fillable = [
      'username', 'password', 'availability_status', 'profile_image'
    ];

    protected $hidden = [
      'password'
    ];

    // public function user() {
    //     return $this->hasOne(User::class, 'client_id');
    // }

    public function service_requests() {
        return $this->belongsToMany(
            ServiceRequest::class, 'service_request_handles', 'tech_id'
        );
    }

    public function tech_info() {
      return $this->hasOne(TechInfo::class, 'tech_id');
    }
}
