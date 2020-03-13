<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appliance extends Model
{
    protected $fillable = ['name', 'image'];

    public function service_fees() {
        return $this->hasMany(ServiceFee::class, 'appliance_id');
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function unit() {
        return $this->belongsTo(UnitType::class, 'unit_id');
    }

    public function service_type() {
      return $this->belongsTo(ServiceType::class, 'service_type_id');
    }

    public function serviceRequests() {
        return $this->belongsToMany(ServiceRequest::class);
    }
}
