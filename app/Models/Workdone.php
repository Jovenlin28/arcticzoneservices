<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Workdone extends Model
{
    // Table Name
    protected $table = 'workdone';

    protected $fillable = ['name'];

}
