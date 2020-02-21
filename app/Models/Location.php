<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Location extends Model
{
    // Table Name
    protected $table = 'locations';

    protected $fillable = ['name'];

    public function service_requests() {
      return $this->hasMany(ServiceRequest::class, 'location_id');
    }
}
