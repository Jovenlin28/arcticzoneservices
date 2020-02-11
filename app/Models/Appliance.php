<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appliance extends Model
{
    protected $fillable = ['name', 'image'];

    public function service_fees() {
        return $this->hasMany(ServiceFee::class, 'appliance_id');
    }

    public function serviceRequests() {
        return $this->belongsToMany(ServiceRequest::class);
    }
}
