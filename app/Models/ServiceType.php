<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ServiceType extends Model
{
    // Table Name
    protected $table = 'service_types';

    protected $fillable = ['name'];

    public function service_fees() {
        return $this->hasMany(ServiceFee::class, 'service_id');
    }
}
