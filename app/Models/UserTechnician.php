<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTechnician extends Model
{
    // protected $fillable = [
    //     'firstname', 'lastname', 'contact_number',
    // ];

    protected $table = 'users_tech';

    // public function user() {
    //     return $this->hasOne(User::class, 'client_id');
    // }

    public function service_requests() {
        return $this->belongsToMany(
            ServiceRequest::class, 'service_request_handles', 'tech_id'
        );
    }
}
