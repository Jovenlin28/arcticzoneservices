<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class HorsePowerFee extends Model
{
    // Table Name
    protected $table = 'horse_power_fees';

    protected $fillable = ['fee', 'appliance_id', 'hp_id'];


    public function appliance() {
      return $this->belongsTo(Appliance::class, 'appliance_id');
    }

    public function horse_power() {
      return $this->belongsTo(HorsePower::class, 'hp_id');
    }

}
