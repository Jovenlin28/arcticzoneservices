<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class HorsePower extends Model
{
    // Table Name
    protected $table = 'horse_power';

    protected $fillable = ['hp'];

}
