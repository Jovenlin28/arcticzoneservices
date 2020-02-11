<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ServiceFee extends Model
{
    // Table Name
    protected $table = 'service_fees';

    protected $fillable = ['service_id', 'appliance_id', 'fee'];

    public function appliance() {
        return $this->belongsTo(Appliance::class, 'appliance_id');
    }

    public function service_type() {
        return $this->belongsTo(ServiceType::class, 'service_id');
    }
}
