<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Remarks extends Model
{
    // Table Name
    protected $table = 'remarks';

    protected $fillable = ['name', 'service_request_id', 'technician_id'];

    public function service_request() {
        return $this->belongsTo(ServiceRequest::class, 'service_request_id');
    }

    public function technician() {
      return $this->belongsTo(UserTechnician::class, 'technician');
  }
}
