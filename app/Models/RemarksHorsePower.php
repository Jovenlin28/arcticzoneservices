<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class RemarksHorsePower extends Model
{
  // Table Name
  protected $table = 'remarks_horse_power';

  protected $fillable = ['horse_power_id', 'remarks_id', 'appliance_id'];
}
