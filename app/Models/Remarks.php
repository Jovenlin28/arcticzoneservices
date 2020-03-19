<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Remarks extends Model
{
  // Table Name
  protected $table = 'remarks';

  protected $fillable = ['name', 'service_request_id', 'technician_id', 'workdone_desc'];

  public function horse_power() {
    return $this->hasMany(RemarksHorsePower::class, 'remarks_id');
  }
}
