<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ServiceTimeslot extends Model
{
    // Table Name
    // protected $table = 'units';

    protected $fillable = ['start', 'end'];

    public function service_requests() {
      return $this->hasMany(ServiceRequest::class, 'timeslot_id');
    }

}
